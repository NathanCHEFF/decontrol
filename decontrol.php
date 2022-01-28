<?php
class decontrol
{
  
  // ver 3.0
  
  var $list;
  var $flist;
  
  private static $instance = null;
  
  public function __construct(){
    
  }
  
  public static function getMe()
  {
      if (static::$instance === null) {
          static::$instance = new static();
      }
      return static::$instance;
  }

  
  public function start(){
    while( true ) {
       $this->loadList( $this->getList() );
       $c = sizeof($this->list);
       for( $i = 0; $i < $c ; $i++ ) {
          if ( $this->checkPID( $this->list[$i]['pid'] )) {
            // if process exist
          } else {
            // if process is not exist
            $b = $this->startProc( $this->list[$i]['exec'] );
            
          }
       }
       // update list
    }

  }

  public function checkPID(){
    # return false if pid is empty
    # Вы можете использовать psилиls -l /proc/$PID/exe 
    # ps -fp PIDпокажет полную команду
  }
  
  public function getList(){
    return json_decode( file_get_contents( $this->flist ), true );
  }
  public function loadList($list){
    $this->list = $list;
  }
  public function setList($list){
    file_put_contents( $this->flist, json_encode($list) );
  }
  
  
  protected function checkPID(){
    
  }
  
  protected function killPID(){
    
  }
  
  public function startProc(){
    
  }
  
  
  
}
?>
