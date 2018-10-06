<?php
  

  use App\Models\{Job, Project};


  $jobs = Job::all();
  $projects = Project::all();


  
  function printElement($elemento) {

    echo '
      <li class="work-position">
        <h5>'.$elemento->title.'</h5>
        <p>'.$elemento->description.'</p>
        <p>'.$elemento->getDurationAsString().'</p>
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
