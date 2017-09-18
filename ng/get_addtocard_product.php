<?php

	echo '<table class="table table-striped" style="font-size:12px;">';
    echo '                <thead>';
    echo '                    <tr>';
    echo '                        <th>No</th>';
    echo '                        <th>photo</th>';
    echo '                        <th>Name</th>';
    echo '                        <th>Quantity</th>';
    echo '                        <th>Price</th>';
    echo '                        <th>Total</th>';
    echo '                    </tr>';    
    echo '                </thead>';
    echo '                <tbody>';
    if(!empty($_SESSION['addtocart']))
    {
    	foreach ($_SESSION['addtocart'] as $key => $value) {
    		echo '                    <tr>';
		    echo '                        <td>$key+1</td>';
		    echo '                        <td></td>';
		    echo '                        <td></td>';
		    echo '                        <td></td>';
		    echo '                        <td></td>';
		    echo '                        <td></td>';
		    echo '                    </tr>';
		    echo '                    <tr style="width:200px">';
		    echo '                        <td></td>';
		    echo '                        <td></td>';
		    echo '                        <td></td>';
		    echo '                        <td colspan="2"><div class="pull-right"><strong>Grand Total</strong></div></td>';
		    echo '                        <td></td>';
		    echo '                    </tr>';
		    echo '                </tbody>';
		    echo '            </table>';
		                
		    echo '            <div class="pull-right">';
		    echo '                <button class="btn btn-success" style="margin:15px;">Check Out</button>';
		    echo '            </div>';
    	}
    }
    
?>