<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/up.php"); ?>
<style>
.borderhard table td {text-align:right;direction:rtl;}
</style>
<form name="form" id="form" action="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?>searches/find" method="post" enctype="multipart/form-data">
<table id="myTable" class=""> 
            <thead> 
            <tr> 
                <th class="first"></th>
				<th class="last" style="width:600px !important"> </th>
            </tr> 
            </thead> 
            <tbody> 
                <tr class="table-row0">
                    <td>Search</td>
                    <td style="width:600px !important;display:inline-block">
                        <input type="text" id="search" name="search" value="">
                    </td>
                </tr>
               
                <tr class="table-row1">
                    <td>Search Inside</td>
                    <td>
                        <input type="checkbox" checked='checked' id="articles" name="articles" value="1"> Articles
                        <input type="checkbox" checked='checked' id="services" name="services" value="1"> Services
                        <input type="checkbox" checked='checked' id="photos" name="photos" value="1"> Photos
                        <input type="checkbox" checked='checked' id="contact" name="contact" value="1"> Contact
                        <br>
                        <input type="checkbox" checked='checked' id="inspaction" name="inspaction" value="1"> Inspaction
                        <input type="checkbox" checked='checked' id="maillist" name="maillist" value="1"> Maillist
                        <input type="checkbox" checked='checked' id="users" name="users" value="1"> Users
                        <input type="checkbox" checked='checked' id="groups" name="groups" value="1"> Groups
                        <br>
                        <input type="checkbox" checked='checked' id="clients" name="clients" value="1"> Clients
                        <input type="checkbox" checked='checked' id="suppliers" name="suppliers" value="1"> Suppliers
                        <input type="checkbox" checked='checked' id="banks" name="banks" value="1"> Our Bank Accounts
                        <input type="checkbox" checked='checked' id="otherbanks" name="otherbanks" value="1"> Banks
                        <br>
                        <input type="checkbox" checked='checked' id="categories" name="categories" value="1"> Categories
                        <input type="checkbox" checked='checked' id="stockrooms" name="stockrooms" value="1"> Stores
                        <input type="checkbox" checked='checked' id="items" name="items" value="1"> Items
                        <input type="checkbox" checked='checked' id="stockallocations" name="stockallocations" value="1"> Stockallocations
                        <br>
                        <input type="checkbox" checked='checked' id="stockrooms" name="stockrooms" value="1"> Stockrooms
                        <input type="checkbox" checked='checked' id="good" name="good" value="1"> Good
                        <input type="checkbox" checked='checked' id="expenses" name="expenses" value="1"> Expenses
                        <input type="checkbox" checked='checked' id="incomes" name="incomes" value="1"> Income Check
                        <br>
                        <input type="checkbox" checked='checked' id="pays" name="pays" value="1"> Payment Check
                        <input type="checkbox" checked='checked' id="purchases" name="purchases" value="1"> Purchases
                        <input type="checkbox" checked='checked' id="workorders" name="workorders" value="1"> Workorders
                        <input type="checkbox" checked='checked' id="certificates" name="certificates" value="1"> Certificates
                        <br>
                        <input type="checkbox" checked='checked' id="delivery" name="delivery" value="1"> Delivery
                        <input type="checkbox" checked='checked' id="quotations" name="quotations" value="1"> Quotations
                        <br>
                    </td>
                    
                </tr>
                <tr class="table-row0">
                    <td>BETWEEN</td>
                    <td>
                        From <input type="text" name="date_from" id="date_from" class="date-pick required wide" > &nbsp;&nbsp;&nbsp;
                        To <input type="text" name="date_to" id="date_to" class="date-pick required wide" > &nbsp;&nbsp;&nbsp;
                    </td>
                    
                </tr>
             
                <tr class="table-row0">
                    <td colspan="2" style="text-align:center;">
                        <input type="hidden" name="searchtype" value="advancedsearch">
                        <input type="submit" name="send" value="Search">
                    </td>
                </tr>
               
                
            </tbody> 
            </table>
</form>
<?php include(Doo::conf()->SITE_PATH.Doo::conf()->PROTECTED_FOLDER."viewc/down.php"); ?>