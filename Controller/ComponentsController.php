<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ComponentsController extends Controller
{
  public function navBar(Request $request){
    $navItems = array(
        array('id' => 1, 'itemClass' => 'nav-item', 'linkClass' => 'nav-link', 'link' => '#', 'title' => 'Accueil', 'state' => 'active', 'icon' => 'glyphicon glyphicon-home'),
        array('id' => 2, 'itemClass' => 'nav-item', 'linkClass' => 'nav-link', 'link' => '#', 'title' => 'Ecoles', 'state' => 'inactive', 'icon' => 'glyphicon glyphicon-globe'),
        array('id' => 3, 'itemClass' => 'nav-item', 'linkClass' => 'nav-link', 'link' => '#', 'title' => 'Forums', 'state' => 'inactive', 'icon' => 'glyphicon glyphicon-tags'),
        array('id' => 4, 'itemClass' => 'nav-item', 'linkClass' => 'nav-link', 'link' => '#', 'title' => 'Parcours', 'state' => 'inactive', 'icon' => 'glyphicon glyphicon-education'),
        array('id' => 5, 'itemClass' => 'nav-item', 'linkClass' => 'nav-link', 'link' => '#', 'title' => 'Groups', 'state' => 'inactive', 'icon' => 'glyphicon glyphicon-user'),
        array('id' => 7, 'itemClass' => 'nav-item', 'linkClass' => 'nav-link', 'link' => '#', 'title' => 'Formations', 'state' => 'inactive', 'icon' => 'glyphicon glyphicon-briefcase')
      );
    return $this->render('components/navBar.html.twig', array('items' => $navItems));
  }
}
