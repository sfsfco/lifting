
<tfoot>
<tr>
    <td colspan="10" class="table-footer"><?php for($x=1;$x<=$data['pages'];$x++){?>
        <?php if($data['selectedpage']==$x || $x=='0'){ ?><div class="footer-selected"><? echo($x); ?></div><?php }else{ ?>
        <div class="footer-unselected"><a class="fastmenu" href="<?php echo $data['formUrl'] ?><?php echo Doo::conf()->adminmod; ?><?php echo Doo::conf()->AUTO_VIEW_RENDER_PATH[0]; ?>?page=<? echo($x); ?>" ><? echo($x); ?></a></div>
        <?php }} ?>
    </td>
</tr>
</tfoot>