<?php 

// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
//use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Helper\ProgressBar;
use App\Service\ConvertCsvToArray; 
use App\Entity\User; 

class CreateUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:import:user-csv';
    //define ConvertCsvToArray service that will be latter use
    private $convertCsvToArray;
    private $doctrine;

    public function __construct(ConvertCsvToArray $convert, RegistryInterface $registry)
    {
        $this->convertCsvToArray = $convert;
        $this->doctrine = $registry;
        parent::__construct();
    }

    protected function configure()
    {
        $this
        // configure an argument
        //->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
        // the short description shown while running "php bin/console list"
        ->setDescription('Import csv file of user into database.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to import a csv file of user into database...')
        ;
    }

    // ...
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'Import user data from csv file',
            '============',
            '',
        ]);
        // Showing when the script start
        $now = new \DateTime();
        $output->writeln('<info>Start : ' . $now->format('d-m-Y G:i:s') . ' ---</info>');

        // Importing CSV on DB via Doctrine ORM
        $this->import($input, $output);
        // that generates and returns the messages with the 'yield' PHP keyword
        //$output->writeln('username : ' . $input->getArgument('username'));

        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<info>End : ' . $now->format('d-m-Y G:i:s') . ' ---</info>');
    }

    protected function import(InputInterface $input, OutputInterface $output)
    {
        // Getting php array of data from CSV
        $data = $this->getCsv($input, $output);
        // Getting doctrine manager
        $em = $this->doctrine->getManager();
        // Turning off doctrine default logs queries for saving memory
        $em->getConnection()->getConfiguration()->setSQLLogger(null);
        
        // Define the size of record, the frequency for persisting the data and the current index of records
        $size = count($data);
        $batchSize = 20;
        $i = 1;
        
        // Starting progress
        $progress = new ProgressBar($output, $size);
        $progress->start();
        
        // Processing on each row of data
        foreach($data as $row) {
            $user = $em->getRepository(User::class)
                       ->findOneByEmail($row['email']);
             
            // If the user doest not exist we create one
            $output->writeln(' check user existance');
            if(!is_object($user)){
                $output->writeln(' create a new user whit username: '.$row['username'].'');
                $user = new User();
                $user->setEmail($row['email']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
            }
            
            // Updating info
            $user->setLastname($row['telephone']);
            $user->complete();
      
            // Do stuff here !
  
            // Persisting the current user
            $output->writeln(' persist user');
            $em->persist($user);
            
            // Each 20 users persisted we flush everything
            if (($i % $batchSize) === 0) {
                $em->flush();
                // Detaches all objects from Doctrine for memory save
                $em->clear();
                
                // Advancing for progress display on console
                $progress->advance($batchSize);
        
                $now = new \DateTime();
                $output->writeln(' of users imported ... | ' . $now->format('d-m-Y G:i:s'));
            }
            $i++;
        }
    
        // Flushing and clear data on queue
        $em->flush();
        $em->clear();
    
        // Ending the progress bar process
        $progress->finish();
    }

    protected function getCsv(InputInterface $input, OutputInterface $output) 
    {
        // Getting the CSV from filesystem
        $fileName = 'public/uploads/import/users.csv';
        
        // Using service for converting CSV to PHP Array
        $data = $this->convertCsvToArray->convert($fileName, ';');
        
        return $data;
    }

}
