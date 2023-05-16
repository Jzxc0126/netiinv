<?php
session_start();
if(isset($_POST["btnexportexcel"]))
{
  $userdeptid =  $_COOKIE['cookieName'];
      $filepath = '../exceltemplates/Inventory List.xlsx';
      error_reporting(E_ALL);
      date_default_timezone_set('Europe/London');
      require_once '../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
      require_once '../PHPExcel-1.8/Classes/PHPExcel.php';
      $excel2 = PHPExcel_IOFactory::createReader('Excel2007');
      $excel2 = $excel2->load($filepath);
      $excel2->setActiveSheetIndex('0');
      //$excel2->getActiveSheet()->setCellValue('A'.$rownumber, $row["lastname"]);

      $query = "SELECT a.itemid , a.itemcode , a.itemname, a.brand,a.departmentid,a.categoryid,a.supplierid,a.locationid,a.assetusageid,a.assetstatusid,a.datepurchased,
      b.department,
      c.category,
      g.supp_name,
      d.locationname,
      e.assetusage,
      f.consumable,
      h.assetstatus
       from inventory_tbl AS a inner join department_tbl as b on a.departmentid=b.departmentid
                                INNER join category_tbl as c on a.categoryid=c.categoryid
                               INNER JOIN supplier_tbl as g on a.supplierid=g.supplierid
                               INNER JOIN location_tbl as d on a.locationid=d.locationid
                               INNER JOIN assetusage_tbl as e on a.assetusageid=e.assetusageid
                               INNER JOIN consumabletype_tbl as f on a.consumabletypeid=f.consumabletypeid
                               INNER JOIN assetstatus_tbl as h on a.assetstatusid=h.assetstatusid
       Where a.departmentid = $userdeptid order by a.itemid asc";
      include '../includes/dbcon.php';
      $statement = $conn->prepare($query);
      $statement->execute();
      $result = $statement->get_result();
      $no = 2;
      while($row = $result->fetch_assoc())
      {
                $itemcode = $row["itemcode"];
                $brand = $row["brand"];
                $itemname = $row["itemname"];
                $category = $row["category"];
                $location = $row["locationname"];
                $suppliername = $row["supp_name"];
                $datepurchased = $row["datepurchased"];
                $assetusage = $row["assetusage"];
                $assetstatus = $row["assetstatus"];
                

              $excel2->getActiveSheet()->setCellValue('A'.$no, $itemcode);
              $excel2->getActiveSheet()->setCellValue('B'.$no, $brand);
              $excel2->getActiveSheet()->setCellValue('C'.$no, $itemname);
              $excel2->getActiveSheet()->setCellValue('D'.$no, $category);
              $excel2->getActiveSheet()->setCellValue('E'.$no, $location);
              $excel2->getActiveSheet()->setCellValue('F'.$no, $suppliername);
              $excel2->getActiveSheet()->setCellValue('G'.$no, $datepurchased);
              $excel2->getActiveSheet()->setCellValue('H'.$no, $assetusage);
              $excel2->getActiveSheet()->setCellValue('I'.$no, $assetstatus);
                 
                 

                $no++;
      }
      $conn->close();

      $objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
      $name = 'List of Inventory.xlsx';
      header('Content-type: application/vnd.ms-excel');
      header('Content-Disposition: attachment; filename='.$name.'');
      $objWriter->save('php://output');
}
?>
