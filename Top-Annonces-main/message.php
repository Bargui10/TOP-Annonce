<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <span>'.$message.'</span>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      ';
   }
}
?>