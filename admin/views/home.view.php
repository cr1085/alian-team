<?php require'sidebar.php'; ?>

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

       <!--Main Content-->
       <div class="content sm-gutter">
        <div class="container-fluid padding-25 sm-padding-10">
            <div class="row">

                <div class="col-12">
                    <div class="section-title">
                        <h4><?php echo _SECTIONES; ?></h4>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="block counter-block mb-4">
                        <div class="value"><?php echo $deals_total; ?></div>
                        <i class="dripicons-broadcast i-icon"></i>
                        <p class="label"><?php echo _DEALS; ?></p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="block counter-block mb-4">
                        <div class="value"><?php echo $users_total; ?></div>
                        <i class="dripicons-user-group i-icon"></i>
                        <p class="label"><?php echo _USERS; ?></p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="section-title">
                        <h4><?php echo _SUMMARY; ?></h4>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="block table-block mb-4">
                        <div class="block-heading d-flex align-items-center">
                            <h5 class="text-truncate"><?php echo _DEALS; ?></h5>
                            <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="../controller/deals.php"><?php echo _VIEWALL; ?> <i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                            <div class="table-responsive text-no-wrap">
                                <table class="table">
                                    <tbody class="text-middle">
                                        <?php foreach($deals as $item): ?>
                                            <tr>
                                                <td class="product" width="50px">
                                                <img class="product-img product-img-w" src="../../images/<?php echo $item['deal_image']; ?>">
                                                </td>
                                                <td class="name"><span class="span-title"><a class="btn-link" href="../controller/edit_deal.php?id=<?php echo echoOutput($item['deal_id']) ?>"><?php echo echoOutput($item['deal_title']); ?></a></span></td>
                                                <td align="right" class="text-muted"><?php echo FormatDate($connect, $item['deal_created']); ?></td> 
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div> 


                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
<div class="col-12">
<p class="text-center padding-25"> Version 2.1.0 </p>
</div>
</div>