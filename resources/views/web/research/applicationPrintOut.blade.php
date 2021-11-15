

<style type="text/css">
    .print {
        font-size: 12px;
    }

    .date {
        display: none;
    }

    @media print {
        .noprint, .no-print * {
            display: none !important;
        }
        /*.date{display:block;}*/
        .visible-print {
            display: block !important;
        }

        .imgg {
            margin-top: -630px;
            margin-left: 200px;
            opacity: 0.2;
            width: 200px;
            /*display:inline-block !important;*/
        }

        .imgg-2 {
            margin-top: -1210px;
            margin-left: 200px;
            opacity: 0.2;
            width: 200px;
            /*display:inline-block !important;*/
        }
    }

    .imgg, .imgg-2 {
        display: none;
    }
</style>
<body>

    <div class="noprint">
       
    </div>

    <!--The Main Content Here Please-->
    <div class="">

        <!-- <div class="alert alert-info">
            <h4 style="text-align:center; font-size: 22px;">PLATEAU STATE POLYTECHNIC BARKIN LADI</h4>
        </div> -->

        <div class="print">
            <h4 style="text-align:center"> Amazon Royal Matrix Strong Global Services<br /><h5 style="text-align:center">(ARM-STRONG GLOBAL SERVICES)</h5> <br /><h6 style="text-align:center">Training Application Printout</h6></h4>

            <div class="print">

                <!-- Page 1 -->
                <table  class="table" width="80">
                    <tbody>
                        <tr>
                            <td> Training:</td>
                            <td id="training_label"> firstText</td>
                        </tr>
                        <tr>
                            <td> School:</td>
                            <td id="school_Text"></td>
                        </tr>
                        <tr>
                            <td> Category:</td>
                            <td id="category_Label"></td>
                        </tr>
                        <tr>
                            <td> Training Group:</td>
                            <td id="group_Label"></td>
                        </tr>
                        <tr>
                            <td> Venue:</td>
                            <td id="Location_Text"></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td id="date_text"></td>
                        </tr>
                        <!-- <tr>
                            <td width="25%"></td>
                            <td align="center">

                            </td>
                            <td width="25%"></td>
                        </tr>
                        <tr>
                            <td>
                                <span >
                                    <strong>
                                        <p><small>RECTOR: Bldr. John Datoegoem Dawam
                                                                M.Sc (Const. Mgt), B.Sc (Bidg),
                                                                MNIOB CORBON
                                            </small>
                                        </p>
                                    </strong></span><br>
                                <span>
                                    <strong>
                                        <p><small>REGISTRAR:  JOSIAH M. GOYOL  B.SC., MBA, D,TH. FICA, MNIM
                                        </small></p>
                                    </strong>
                                </span><br>
                               
                            </td>
                            <td style="text-align:center">
                                <div>
                                    <img src="{!!asset('/img/unnamed.png') !!}" width=150>
                                </div>
                            </td>
                            <td>
                                <span class="">
                                    <strong> P.M.B 02023 BUKURU </strong> <br>
                                    <strong>TEL: </strong> 273-463857, 090-600112
                                    <strong>EMAIL:information_pro@plapoly.edu.ng <br>registrar@plapoly.edu.ng <br>plapoly@yahoo.com </strong>
                                </span>
                                <br>
                                <br>
                                <span class="" >
                                    <br>
                                    <strong><?php echo date("D M j G:i:s T Y"); ?></strong>
                                </span>
                            </td>
                        </tr>


                        <tr>
                            <td width="25%"></td>
                            <td align="center">
                                <h6 style=" font-size: 10px;"><strong>OFFER OF PROVISIONAL ADMISSION FOR  ACADEMIC SESSION (MORNING/EVENING)</strong></h6>
                                <hr>
                            </td>
                            <td width="25%"></td>
                        </tr> -->
                    </tbody>
                </table>
                <p>Registered Participants</p>
                <table class="table table-bordered" id="dynamic_field_building">
                    <tbody>

                    </tbody>
                </table>

                <!-- Begining of content positioning -->
                <div class="row-fluid">


                     
                    <br>
                    
                <!--End Transcript form Template-->
                <h6 align="center" style=" font-size: 12px;">Dengkat <br />For: Management<h6 align="center" style=" font-size: 12px;">Arm-strong Global Services</h6></h6>

                <div class="row">
                    <div class="span2 offset6">
                        <div class="noprint">
                            <label class="control-label"></label>
                            <div class="controls no-print">
                                <button type="submit" class="btn  printbtn">Print <i class="icon-print"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div>
                    <img src="{!!asset('/img/unnamed.png') !!}" width=150> 
                    <img src="{!!asset('/img/unnamed.png') !!}" width=150>
                </div> -->
            </div>
    </div>

    <!-- Footer for the page -->
    <div class="noprint">


    </div>

</body>


<script>
    jQuery.noConflict();
    jQuery(document).ready(function () {
        jQuery('.printbtn').click(function () {
            window.print();
        });
    });
</script>
