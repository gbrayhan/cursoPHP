<?php
  

  require_once 'vendor/autoload.php'; 
  // require_once 'app/Models/Job.php';
  // require_once 'app/Models/Project.php';
  // require_once 'app/Models/Printable.php';
  
  // require 'lib1/Project.php';

  // use App\Models\Job;
  // use App\Models\Project;
  // use App\Models\Printable;
  use App\Models\{Job, Project, Printable};


 // $jobs = [
 //    [
 //      'title' => 'PHP Developer',
 //      'description' => 'Este es un mensaje y es increible.',
 //      'visible' => true,
 //      'monts' => 12
 //    ],
 //    [
 //      'title' => 'Python Developer',
 //      'visible' => false,
 //      'monts' => 16
 //    ],
 //    [
 //      'title' => 'Deops',
 //      'visible' => true,
 //      'monts' => 8
 //    ],
 //    [
 //      'title' => 'Node Dev',
 //      'visible' => true,
 //      'monts' => 25
 //    ],
 //    [
 //      'title' => 'Frontend',
 //      'visible' => true,
 //      'monts' => 9
 //    ]   
 //  ];



  $job1 = new Job('PHP Developer','This is an awesome job');
  $job1->visible = true;
  $job1->monts = 16;

  $job2 = new Job('Python Developer','This is an awesome job for Python');
  $job2->visible = true;
  $job2->monts = 23;

  $project1= new Project('Laravel Developer','This is an awesome job for Laravel');

  $jobs = [
    $job1,
    $job2,
  ];

$projects = [
  $project1
];


  

  // function printJobs($jobs) {

  //   if ($jobs['visible']== false) {
  //     return;
  //   }
  //   echo '
  //     <li class="work-position">
  //       <h5>'.$jobs['title'].'</h5>
  //       <p>'.$jobs['description'].'</p>
  //       <p>'.getDuration($jobs['monts']).'</p>
  //       <strong>Achievements:</strong>
  //       <ul>
  //         <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
  //         <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
  //         <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
  //       </ul>
  //     </li>
  //   '; 
  // }
  
  function printElement(Printable $job) {

    if ($job->visible == false) {
      return;
    }
    echo '
      <li class="work-position">
        <h5>'.$job->getTitle().'</h5>
        <p>'.$job->getDescription().'</p>
        <p>'.$job->getDurationAsString().'</p>
        <strong>Achievements:</strong>
        <ul>
          <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
        </ul>
      </li>
    '; 
  }
?>
