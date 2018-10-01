<?php
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

/**
 * 
 */
  class Job {
    // function __construct(argument) {
    // }
    private $title;
    public $description;
    public $visible;
    public $monts;


    public function setTitle($title) {
      $this->title = $title;
    }
    public function getTitle() {
      return $this->title;
    }



  }
  $job1 = new Job();

  $job1->setTitle('PHP Developer');
  $job1->description = 'This is an awesome job';
  $job1->visible = true;
  $job1->monts = 16;

  $job2 = new Job();

  $job2->setTitle('Python Developer');
  $job2->description = 'This is an awesome job for Python';
  $job2->visible = true;
  $job2->monts = 23;


  $jobs = [
    $job1,
    $job2
  ];


  function getDuration($monts) {

    $years= floor($monts / 12);
    $extraMonts = $monts % 12;

    if (($years == 0) && ($monts == 1)) {
      return "$monts mes"; 
    } else if (($years == 0) && ($monts > 1)) {
      return "$monts meses"; 
    } else if (($years == 1) && ($extraMonts == 0)) {
      return "$years año";
    } else if (($years == 1) && ($extraMonts == 1)) {
      return "$years año $extraMonts mes";
    } else if (($years == 1) && ($extraMonts > 1)) {
      return "$years año $extraMonts meses";
    } else if (($years > 1) && ($extraMonts == 0)) {
      return "$years años";
    } else if (($years > 1) && ($extraMonts == 1)) {
      return "$years años $extraMonts mes";
    } else if (($years > 1) && ($extraMonts > 1)) {
      return "$years años $extraMonts meses";
    }
  }

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
  
  function printJobs($job) {

    if ($job->visible == false) {
      return;
    }
    echo '
      <li class="work-position">
        <h5>'.$job->getTitle().'</h5>
        <p>'.$job->description.'</p>
        <p>'.getDuration($job->monts).'</p>
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
