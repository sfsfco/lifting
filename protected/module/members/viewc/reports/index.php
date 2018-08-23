<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table td {text-align:left;}
</style>
<table id="myTable" class="tablesorter"> 
            <thead> 
            <tr> 
				<th class="first">Report </th>
				<th class="last">Number</th>
            </tr> 
            </thead> 
            <tbody> 
               
                <tr class="table-row0">
                    <td>
                        <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports/report1" class="link">
                        Stock cedit
                        </a>
                    </td>
                    <td>1</td>
                </tr>
               
                <tr class="table-row1">
                    <td>
                    <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports/report2" class="link">
                        Sales Movment
                    </a>
                    </td>
                    <td>2</td>
                </tr>
                <tr class="table-row0">
                    <td>
                    <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports/report3" class="link">
                        Request Items
                    </a>
                    </td>
                    <td>3</td>
                </tr>
                <tr class="table-row1">
                    <td>
                    <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports/report4" class="link">
                        Suppliers
                    </a>
                    </td>
                    <td>4</td>
                </tr>
                <tr class="table-row0">
                    <td>
                    <a  href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->membermod; ?>reports/report5" class="link">
                        Clients
                    </a>
                    </td>
                    <td>5</td>
                </tr>
               
                
            </tbody> 
            </table>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>