<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$session_id = Uuid::generate();

$consumer_key = "QTALrtaDNIbh3msw";
$consumer_secret = "qHNrgFt1DH90zgkPAvl1oLFCdquhdmdT40LkGFmT";

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain
);

$state = [
    "initial",
    "resume",
    "review"
];

$studentid = 'reportsapitestuser';

// Test 1: all items are from one org and ibk
// $studentid = 'all-items-questions-are-from-one-org-and-ibk';
// $items = [
//     "reports_api_unit_test_session_detail_by_question_item_1",
//     "reports_api_unit_test_session_detail_by_question_item_2",
//     "reports_api_unit_test_session_detail_by_question_item_3",
//     "reports_api_unit_test_session_detail_by_question_item_4",
//     "reports_api_unit_test_session_detail_by_question_item_5"
// ];
// $session_id = 'b6f4a843-1249-44d8-8c8b-fbafc07d7cf2';
// $state = 'review';

// Test 2: all items are from one org and one pool
// $studentid = 'all-items-questions-are-from-one-org-and-pool';
// $items = [
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1_in_pool",
//         "id" => "reportsapitest_item_from_pool_7"
//     ],
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2_in_pool",
//         "id" => "reportsapitest_item_from_pool_8"
//     ],
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_3_in_pool",
//         "id" => "reportsapitest_item_from_pool_9"
//     ],
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_4_in_pool",
//         "id" => "reportsapitest_item_from_pool_10"
//     ],
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_5_in_pool",
//         "id" => "reportsapitest_item_from_pool_11"
//     ],
// ];
// $session_id = 'f9453866-325d-4a6d-a817-8a257c6afaac';
// $state = 'review';

// Test 3: all items are from one org and some items are from ibk some items are from pool
// ad257098-88a2-4ab7-bd42-e110b849fd2b
// $studentid = 'all-items-questions-are-from-one-org-and-pool';
// $items = [
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1_in_pool",
//         "id" => "reportsapitest_item_from_pool_1"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1_in_pool",
//         "id" => "reportsapitest_item_from_ibk_1"
//     ],
//     [
//         "item_pool_id" => "reports_api_unit_test_session_detail_by_question_with_item_pool_id_1",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2_in_pool",
//         "id" => "reportsapitest_item_from_pool_2"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2_in_pool",
//         "id" => "reportsapitest_item_from_ibk_2"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_3_in_pool",
//         "id" => "reportsapitest_item_from_ibk_3"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_4_in_pool",
//         "id" => "reportsapitest_item_from_ibk_4"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_5_in_pool",
//         "id" => "reportsapitest_item_from_ibk_5"
//     ]
// ];
// $session_id = 'ad257098-88a2-4ab7-bd42-e110b849fd2b';
// $state = 'review';

// Test 4: items are from different orgs
// e8e3ce3e-b8ef-465f-bfe1-cb9103346377
// $studentid = 'all-items-questions-are-from-different-orgs';
// $items = [
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1",
//         "id" => "reportsapitest_item_from_ibk_16"
//     ],
//     [
//         "organisation_id" => 226,
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1",
//         "id" => "reportsapitest_item_from_ibk_17"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2",
//         "id" => "reportsapitest_item_from_ibk_18"
//     ],
//     [
//         "organisation_id" => 226,
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2",
//         "id" => "reportsapitest_item_from_ibk_19"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_3",
//         "id" => "reportsapitest_item_from_ibk_20"
//     ],
//     [
//         "organisation_id" => 226,
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_3",
//         "id" => "reportsapitest_item_from_ibk_21"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_4",
//         "id" => "reportsapitest_item_from_ibk_22"
//     ],
//     [
//         "organisation_id" => 226,
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_4",
//         "id" => "reportsapitest_item_from_ibk_23"
//     ],
//     [
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_5",
//         "id" => "reportsapitest_item_from_ibk_24"
//     ],
//     [
//         "organisation_id" => 226,
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_5",
//         "id" => "reportsapitest_item_from_ibk_25"
//     ]
// ];
// $session_id = 'e8e3ce3e-b8ef-465f-bfe1-cb9103346377';
// $state = 'review';

// Test Case 5: items are from different pools
// 6f4cc838-6345-40c2-9214-a5388c65fef6
// $studentid = 'reportsapitestuser';
// $items = [
//     [
//         "item_pool_id" => "reports_api_session_detail_by_question_test_pool_2",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1_in_pool",
//         "id" => "reportsapitest_item_from_pool_12"
//     ],
//     [
//         "item_pool_id" => "reports_api_session_detail_by_question_test_pool_3",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_1_in_pool",
//         "id" => "reportsapitest_item_from_pool_13"
//     ],
//     [
//         "item_pool_id" => "reports_api_session_detail_by_question_test_pool_2",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2_in_pool",
//         "id" => "reportsapitest_item_from_pool_14"
//     ],
//     [
//         "item_pool_id" => "reports_api_session_detail_by_question_test_pool_3",
//         "reference" => "reports_api_unit_test_session_detail_by_question_item_2_in_pool",
//         "id" => "reportsapitest_item_from_pool_15"
//     ]
// ];
// $session_id = '6f4cc838-6345-40c2-9214-a5388c65fef6';
// $state = 'review';

// Test Case 7: many items but only one questions (= many responses ids but one question)
// 90e8f55c-0b58-4923-af9c-819d816e3923
// $studentid = 'reportsapitestuser';
// $items = [
//     'MultipleItemsWithOnlyOneQuestion_1',
//     'MultipleItemsWithOnlyOneQuestion_2',
//     'MultipleItemsWithOnlyOneQuestion_3',
//     'MultipleItemsWithOnlyOneQuestion_4',
//     'MultipleItemsWithOnlyOneQuestion_5',
//     'MultipleItemsWithOnlyOneQuestion_6',
//     'MultipleItemsWithOnlyOneQuestion_7',
//     'MultipleItemsWithOnlyOneQuestion_8',
//     'MultipleItemsWithOnlyOneQuestion_9',
//     'MultipleItemsWithOnlyOneQuestion_10'
// ];
// $session_id = '90e8f55c-0b58-4923-af9c-819d816e3923';
// $state = 'review';

// Test Case 8: items including features
// 1b88b62c-1b26-45c3-a03d-b1e830a3ee39
// $studentid = 'reportsapitestuser';
// $items = [
//     'response_id_order_test_2',
//     'response_id_order_test_1'
// ];
// $session_id = '1b88b62c-1b26-45c3-a03d-b1e830a3ee3';
// $state = 'review';

//3fda391b-92cd-4914-a389-756d6cfd524e
// Test Case: 9: After this session, question refs will be changed.
// $items = [
//     'reports_api_unit_test_session_detail_by_question_item_10',
//     'reports_api_unit_test_session_detail_by_question_item_11'
// ];
// $session_id = '3fda391b-92cd-4914-a389-756d6cfd524e';
// $state = 'review';

// Test Case: 10: Item pool is updated after submission
// $studentid = 'reportsapitestuser';
// $items = [
//     [
//         "item_pool_id" => "reports_api_item_pool_change_test_pool_1",
//         "reference" => "reports_api_item_pool_change_test_1",
//         "id" => "reportsapitest_item_pool_change_test_1"
//     ],
//     [
//         "item_pool_id" => "reports_api_item_pool_change_test_pool_1",
//         "reference" => "reports_api_item_pool_change_test_2",
//         "id" => "reportsapitest_item_pool_change_test_2"
//     ],
//     [
//         "item_pool_id" => "reports_api_item_pool_change_test_pool_1",
//         "reference" => "reports_api_item_pool_change_test_3",
//         "id" => "reportsapitest_item_pool_change_test_3"
//     ]
// ];
// $session_id = 'ab0f6ef1-3b34-436e-bba2-3ea91eb3282e'
//$state = 'review';

$request = array(
    // 'activity_template_id' => 'ReportAPISessionDetailByQuestionTest_1',
    'activity_id'          => 'reportsapitestviademo',
    'name'                 => 'Items API demo - reports api test',
    'session_id'           => $session_id,
    "rendering_type"       => "assess",
    "state"                => $state,
    'user_id'              => $studentid,
    'assess_inline'        => true,
    "items"                => $items,
    'config'               => array(
        'configuration' => array(
            'submit_failed_options' => array(
                'download' => true
            )
        )
    )
);

print_r($session_id);

include_once 'utils/settings-override.php';

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Customise API Settings"><a href="#" class="text-muted" data-toggle="modal" data-target="#settings"><span class="glyphicon glyphicon-list-alt"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Preview API Initialisation Object"><a href="#"  data-toggle="modal" data-target="#initialisation-preview"><span class="glyphicon glyphicon-search"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/itemsapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>
    <div class="overview">
        <h1>Items API – Activities</h1>
        <p>Activities are a wrapper for multiple items authored in the Learnosity Author site. They can also
        include configuration used by the <a href="<?php echo $env['www'] ?>assessment/assess/index.php">Assess API</a> to control the assessment user interface.</p>
        <p>Preview the <a href="#" data-toggle="modal" data-target="#initialisation-preview">API Initialisation Object</a> to see how simple it can be using the Items API to load activities
        authored in the Learnosity item bank.<p>
        <p><a href="#" data-toggle="modal" data-target="#settings">Customise the activity</a> you want to load.<p>
        <p>Type ctrl+shift+m to open the Administration Panel. The default password is <em>password</em>.</p>
    </div>
</div>

<div class="section">
    <!-- Container for the items api to load into -->
    <div id="learnosity_assess"></div>
</div>
<script src="<?php echo $url_items; ?>"></script>
<script>
    // var eventOptions = {
    //     readyListener: init
    // },
    // activity     = <?php echo $signedRequest; ?>,
    // itemsApp     = LearnosityItems.init(activity, eventOptions),
    // submitNumber = 0;

    // function init () {
    //     itemsApp.assessApp().on('test:save:error', function (e) {
    //         console.log('test:save:error');
    //         console.log(e);
    //     });
    //     itemsApp.assessApp().on('test:submit:error', function (e) {
    //         console.log('test:submit:error');
    //         console.log(e);
    //     });

    //     itemsApp.assessApp().questionsApp().submit = function (settings) {
    //         submitNumber++;
    //         settings.error({message: 'error'});
    //         if (!$('#alert-submit-error').length && submitNumber < 3) {
    //             $('#test-save-submit .modal-dialog').append(
    //                 '<div class="alert alert-info" role="alert" style="margin-top: 20px" id="alert-submit-error">Make sure you <em>Try again</em> twice</div>'
    //             );
    //         }
    //         if (submitNumber >= 3) {
    //             $('#alert-submit-error').hide();
    //         }
    //     };
    // }
    var eventOptions = {
            readyListener: function () {
                console.log('Learnosity Items API is ready');
            }
        },
        activity = <?php echo $signedRequest; ?>,
        itemsApp = LearnosityItems.init(activity, eventOptions);
</script>

<?php
    include_once 'views/modals/settings-items-activities.php';
    include_once 'views/modals/initialisation-preview.php';
    include_once 'includes/footer.php';
