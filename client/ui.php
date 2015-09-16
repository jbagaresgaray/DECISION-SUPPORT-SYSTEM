<?php 
session_start();

if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
    header("Location: index.php");
}elseif (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    if($_SESSION['users']['access'][1]['allow'] != 1){
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php require_once('include/header.php'); ?>

<style type="text/css">
table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{margin:.75in .7in .75in .7in;
	mso-header-margin:.3in;
	mso-footer-margin:.3in;}
.style0
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:Normal;
	mso-style-id:0;}
td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;}
.xl65
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl66
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl67
	{mso-style-parent:style0;
	text-align:center;
	border:.5pt solid windowtext;}
.xl68
	{mso-style-parent:style0;
	text-align:center;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;}
.xl69
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:.5pt solid windowtext;}
.xl70
	{mso-style-parent:style0;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl71
	{mso-style-parent:style0;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl72
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl73
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl74
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:2.0pt double windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl75
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl76
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;}
.xl77
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl78
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl79
	{mso-style-parent:style0;
	font-size:18.0pt;
	font-weight:700;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl80
	{mso-style-parent:style0;
	font-size:18.0pt;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;}
.xl81
	{mso-style-parent:style0;
	font-size:18.0pt;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl82
	{mso-style-parent:style0;
	font-size:18.0pt;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl83
	{mso-style-parent:style0;
	font-size:18.0pt;
	text-align:center;
	vertical-align:middle;}
.xl84
	{mso-style-parent:style0;
	font-size:18.0pt;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl85
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl86
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;}
.xl87
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl88
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl89
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl90
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;}
.xl91
	{mso-style-parent:style0;
	text-align:center;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:1.0pt solid windowtext;}
.xl92
	{mso-style-parent:style0;
	text-align:center;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl93
	{mso-style-parent:style0;
	text-align:center;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl94
	{mso-style-parent:style0;
	text-align:center;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl95
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl96
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:2.0pt double windowtext;
	border-left:none;}
</style>

    <body>
        <div id="wrapper">
            <?php require_once('include/sidebar.php'); ?>
                <div id="page-wrapper">
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <h2> CNO - Weight Standards</h2>
                            </div>
                        </div>
                        <!-- /. ROW  -->
                        <hr />
                        <div class="row table-responsive">
                            <table class="table table-bordered">
                                    <tr height=20 style='height:15.0pt'>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td colspan=7 height=20 class='xl85' style='height:15.0pt'>Weight (kg) for Age of Child 0-71 Months</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl70' style='height:15.0pt'>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class=xl71>&nbsp;</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td rowspan='4' height='81' class='xl88' style='border-bottom:2.0pt double black;height:61.0pt'>Age 2/(months)</td>
                                        <td colspan=6 class='xl92' >Weight</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl66' style='height:15.0pt;border-top:none;border-left:none'>SU</td>
                                        <td colspan=2 class='xl66' style='border-left:none'>UW</td>
                                        <td colspan=2 class='xl66' style='border-left:none'>Normal</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>OW</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td rowspan=2 height=41 class='xl66' style='border-bottom:2.0pt double black;height:31.0pt;border-top:none'>&lt; -3SD</td>
                                        <td class='xl67' style='border-top:none;border-left:none'>&lt; -3 SD</td>
                                        <td class='xl67' style='border-top:none;border-left:none'>&lt;-2 SD</td>
                                        <td class='xl67' style='border-top:none;border-left:none'><span style='mso-spacerun:yes'>&nbsp;</span>-2 SD</td>
                                        <td class='xl66' style='border-top:none;border-left:none'><span style='mso-spacerun:yes'>&nbsp;</span>+2 SD</td>
                                        <td rowspan=2 class=xl95 style='border-bottom:2.0pt double black;border-top:none'>&gt;+2 SD</td>
                                    </tr>
                                    <tr height=21 style='height:16.0pt'>
                                        <td height=21 class='xl68' style='border-bottom:2.0pt double black;height:16.0pt;border-top:none;border-left:none'>From</td>
                                        <td class='xl68' style='border-bottom:2.0pt double black;border-top:none;border-left:none'>To</td>
                                        <td class='xl68' style='border-bottom:2.0pt double black;border-top:none;border-left:none'>From</td>
                                        <td class='xl69' style='border-bottom:2.0pt double black;border-top:none;border-left:none'>To</td>
                                    </tr>
                                    <tr height=21 style='height:16.0pt'>
                                        <td height=21 class=xl73 style='height:16.0pt;border-top:none'>0</td>
                                        <td class='xl65' style='border-top:none;border-left:none'>2.1</td>
                                        <td class='xl65' style='border-top:none;border-left:none'>2.2</td>
                                        <td class='xl65' style='border-top:none;border-left:none'>2.4</td>
                                        <td class='xl65' style='border-top:none;border-left:none'>2.5</td>
                                        <td class='xl65' style='border-top:none;border-left:none'>4.4</td>
                                        <td class='xl74' style='border-top:none;border-left:none'>4.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>2.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>3.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>3.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>5.9</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>3.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>3.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>4.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>4.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.1</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>7.2</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>4.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>4.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>4.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>8.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>4.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>8.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>9.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>9.9</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>5.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>10.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>10.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>11.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>10</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>11.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>11</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>11.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>12</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>6.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>12.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>13</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>12.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>14</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.6</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>12.7</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>15</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>12.9</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>16</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.1</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>13.2</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>17</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>13.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>18</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>7.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>13.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>19</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>14</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>20</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>14.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>21</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.5</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>14.6</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>22</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>14.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>23</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>15.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>24</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>15.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>25</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.5</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>15.6</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>26</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>8.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>15.9</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>27</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>16.1</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>16.2</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>28</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>16.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>16.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>29</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>16.6</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>16.7</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>30</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>16.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>17</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>31</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>17.1</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>17.2</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>32</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>17.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>17.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>33</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>17.6</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>17.7</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>34</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>17.8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>17.9</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>35</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>9.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>18.1</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>18.2</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>36</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>18.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>18.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>37</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>18.6</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>18.7</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>38</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>18.8</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>18.9</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>39</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>19</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>19.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>40</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>19.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>19.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>41</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>19.5</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>19.6</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>42</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>19.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>19.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>43</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>20</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>20.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>44</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>20.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>20.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>45</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>10.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>20.5</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>20.6</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>46</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>20.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>20.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>47</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>20.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>21</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>48</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>21.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>21.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>49</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>21.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>21.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>50</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>21.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>21.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>51</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>21.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>22</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>52</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>22.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>22.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>53</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>22.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>22.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>54</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>22.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>22.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>55</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>11.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>22.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>23</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>56</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>23.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>23.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>57</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>23.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>23.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>58</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>23.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>23.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>59</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>23.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>24</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>60</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>24.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>24.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>61</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>24.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>24.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>62</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>12.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>24.4</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>24.5</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>63</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>24.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>24.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>64</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>24.9</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>25</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>65</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>25.2</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>25.3</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>66</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>14.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>25.5</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>25.6</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>67</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.1</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>25.7</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>25.8</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>68</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.2</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>26</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>26.1</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>69</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.7</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.3</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.4</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>26.3</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>26.4</td>
                                    </tr>
                                    <tr height=20 style='height:15.0pt'>
                                        <td height=20 class='xl75' style='height:15.0pt;border-top:none'>70</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.8</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>13.9</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.5</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>15.6</td>
                                        <td class='xl66' style='border-top:none;border-left:none'>26.6</td>
                                        <td class='xl72' style='border-top:none;border-left:none'>26.7</td>
                                    </tr>
                                    <tr height=21 style='height:16.0pt'>
                                        <td height=21 class=xl76 style='height:16.0pt;border-top:none'>71</td>
                                        <td class='xl77' style='border-top:none;border-left:none'>13.9</td>
                                        <td class='xl77' style='border-top:none;border-left:none'>14</td>
                                        <td class='xl77' style='border-top:none;border-left:none'>15.6</td>
                                        <td class='xl77' style='border-top:none;border-left:none'>15.7</td>
                                        <td class='xl77' style='border-top:none;border-left:none'>26.8</td>
                                        <td class='xl78' style='border-top:none;border-left:none'>26.9</td>
                                    </tr>
                            </table>
                        </div>
                        <!-- /. ROW  -->
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="../assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="../assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="../assets/js/custom.js"></script>
    </body>

</html>
