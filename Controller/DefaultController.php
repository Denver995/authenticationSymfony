<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
  /**
   * @Route("/default_home", name="default_app_home")
   */
  public function default_home_page(Request $request)
  {
    $schools = array(
        array('link' => '#', 'title' => 'Students', 'bgcolor' => 'success'),
        array('link' => '#', 'title' => 'professor', 'bgcolor' => 'info'),
        array('link' => '#', 'title' => 'Classes', 'bgcolor' => 'secondary'),
        array('link' => '#', 'title' => 'Timetable', 'bgcolor' => 'warning')
      );

    $admin_features = array(
        array('link' => '#', 'title' => 'Students', 'bgcolor' => 'success'),
        array('link' => '#', 'title' => 'professor', 'bgcolor' => 'info'),
        array('link' => '#', 'title' => 'Classes', 'bgcolor' => 'secondary')
      );

    $learning_features = array(
        array('link' => '#', 'title' => 'Students', 'bgcolor' => 'success'),
        array('link' => '#', 'title' => 'professor', 'bgcolor' => 'info'),
        array('link' => '#', 'title' => 'Classes', 'bgcolor' => 'secondary')
      );
    return $this->render('home/default_home_page.html.twig', array('schools' => $schools, 'admin_features' => $admin_features, 'learning_features' => $learning_features));
  }

  /**
   * @Route("/admin-dashbord", name="app_home")
   */
  public function admin_dashbord(Request $request)
  {
    $menuItems = array(
        array('link' => '#', 'title' => 'Students', 'bgcolor' => 'success'),
        array('link' => '#', 'title' => 'professor', 'bgcolor' => 'info'),
        array('link' => '#', 'title' => 'Classes', 'bgcolor' => 'secondary'),
        array('link' => '#', 'title' => 'Timetable', 'bgcolor' => 'warning'),
        array('link' => '#', 'title' => 'Exam', 'bgcolor' => 'dark'),
        array('link' => '#', 'title' => 'Track', 'bgcolor' => 'primary'),
        array('link' => '#', 'title' => 'Departements', 'bgcolor' => 'info')
      );
    return $this->render('home/admin_dashbord.html.twig', array('menuItems' => $menuItems));
  }

  /**
   * @Route("/student/dashboard", name="app_student_dashboard")
   */
  public function dashboard_student(Request $request)
  {
    return $this->render('home/dashboard_student.html.twig');
  }
}
