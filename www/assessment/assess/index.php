<?php
include_once '../../config.php';
include_once 'includes/header.php';
?>

    <div class="jumbotron section">
        <div class="pull-right toolbar">
            <ul class="list-inline">
                <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/itemsapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            </ul>
        </div>
        <h1>Assess API</h1>
        <div class="section-intro">
            <p>Learnosity's <b>Assess API</b> provides a simple way to access content from the Learnosity
                item bank, and to optionally pull in activities (assessments) that can be embedded in your pages.
                It leverages the <a href="../questions/index.php">Questions API</a></p>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Use our Assessment Layer</h2>
                    </div>
                    <div class="panel-body">
                        <p>With the flick of a switch turn items into assessments.
                            Truly write once - use anywhere.</p>
                        <p>Uses the power of our Assess API for a full assessment experience.</p>
                        <p class="text-right">
                            <a class="btn btn-primary btn-md" href="./assessapi.php">Demo</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Assess API Events</h2>
                    </div>
                    <div class="panel-body">
                        <p>Display items from the Learnosity item bank in no time with the Items API.</p>
                        <p>Leverages the Questions API's power and makes it faster to integrate.</p>
                        <p class="text-right">
                            <a class="btn btn-primary btn-md" href="./assessapi_events.php">Demo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'includes/footer.php';
