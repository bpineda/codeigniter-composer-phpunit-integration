<?php

/**
 * Utilities for Model Testing 
 * 
 * This class will clean the DB before we start our Model Tests
 * 
 * 
 */
class CIUtilities extends PHPUnit_Framework_TestCase
{
    /**
     * Reference to CodeIgniter
     * 
     * @var resource
     */
    private $CI;
    
    /**
     * Call parent constructor and initialize reference to CodeIgniter
     * 
     * @internal
     */
    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->CI =& get_instance();  
    }

  public function truncate($table_name)
  {
      return $this->CI->db->truncate($table_name);
  }

  public function clean()
  {
      $this->printDivider();
      $this->printTitleWithColor('Truncating tables', 31);

      $this->CI->db->truncate('test');
      $this->CI->db->query('DELETE FROM test');


  }

  public function populate()
  {

    $this->populateTest();

  }

  private function populateTest()
  {
      $this->printNewLines(1);
      $this->printTitleWithColor('Populating test', 34);

      $sql_catalog = <<<EOL
INSERT INTO `test` (`id`, `name`, `description`) VALUES
(1, 'test1', ''),
(2, 'test2', '');
EOL;

      $executed = $this->CI->db->query($sql_catalog);
      $this->printIfExecuted($executed);

  }

  private function printIfExecuted($execution_value)
  {
      echo "[ " . ($execution_value ? 'x' : '') . " ]";
  }

  private function printDivider()
  {
    echo '
======================================================================================================
';
  }

  private function printNewLines($lines)
  {
      $n = 0;
      while( $n < $lines )
      {
          echo '
';
          $n++;
      }
  }

  public function printTitleWithColor($title, $color)
  {

      echo "\033[{$color}m{$title} \033[0m";

  }

  
}