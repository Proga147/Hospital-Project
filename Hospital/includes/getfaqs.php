  <?php
require_once('config.php');

class getFaqs {


      function getFaqs( )
      {
        $conn = new mysqli('localhost', 'root', '', 'ytcommentsdb');
        $conn = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);  //initalize a new database connection store it in conn
        $stmt = "SELECT * FROM faqs;";                              //select everything from faqs table
        $result =  mysqli_query($conn->getDB(),$stmt);           //check query
        $resultcheck = mysqli_num_rows($result);  //count the number of rows from result

        if($resultcheck > 0)
      {
        while($row = mysqli_fetch_assoc($result))  //fecth an associative array of the data
        {

          $faqs[] = $row;  //assign them to array

      }

        return $faqs;  //return faqs array
      }



      }
}
