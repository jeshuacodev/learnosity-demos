<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'domain' => $domain
);

$request = [
    'activity_id' => '1c658d55-68cf-488e-9f4d-3096fffcb7a4',
    'name' => 'Items API demo - assess activity',
    'rendering_type' => 'assess',
    'type' => 'submit_practice',
    'session_id' => Uuid::generate(),
    // 'session_id' => '9ac6c233-8786-474e-b180-94dcf726a9f4',
    'user_id' => $studentid,
    'items' => [
        'Demo3',
        // 'Demo4',
        // 'accessibility_demo_6',
        // 'Demo6',
        // 'Demo7',
        // 'Demo8',
        // 'Demo9',
        // 'Demo10',
        // 'audioplayer-demo-1'
        '06b16d71-9971-4254-9f8f-44cc825799ac',
        'b3206d89-1fca-4485-ba9d-a338f73abdb6',
        'ee213ba1-a821-48b8-8cb1-9600eb84eff0',
        '0fa2de9a-1ac6-449c-9f11-aee116929210',
        '2c6ed8e5-e6d2-479d-9c9b-b0d41b66391d',
        '248df79d-ef24-4b26-b20f-7abce464f2b8',
        '5d5a7917-12c3-446e-9c1f-15d932ce287e',
        'c42dd5d1-8578-461a-acfa-0c03556bc0b0',
        'a568513a-1e74-4247-9fe7-e0819eccbdf0',
        '7d6d2056-28b4-4c0f-ad41-250adb65928b',
        'bbca3e1e-1736-4d85-bc13-d5f91aa1adec',
        '4e7d3d3e-2a3b-40fc-94fb-99d349044e9b',
        '8c43e434-9c43-4ea8-8bce-4b0cd648e8c5',
        '18516fef-d3b7-4a0e-ba54-34e59d068b30',
        '32fc7b0a-4228-49f7-bde6-ee1846314627',
        '686bbf58-68eb-4959-804c-1fe4f17c9ba5'
    ],
];


include 'utils/settings-override.php';

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Customise API Settings"><a href="#" class="text-muted" data-toggle="modal" data-target="#settings"><span class="glyphicon glyphicon-list-alt"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Preview API Initialisation Object"><a href="#" data-toggle="modal" data-target="#initialisation-preview"><span class="glyphicon glyphicon-search"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/itemsapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>
    <div class="overview">
        <h1>Items API – Assess</h1>
        <p>With the flick of a switch make the items into an assessment. Truly write once - use anywhere.
        <p>
        <p>Type ctrl+shift+m to open the Administration Panel. The default password is <em>password</em>.</p>
    </div>
</div>

<div class="section">
    <div id="learnosity_assess"></div>
</div>
<script src="<?php echo $url_items; ?>"></script>
<script>

    var itemsApp = {};
    var currentRegions = <?php echo json_encode($request['config']['regions']);?>;
    var eventOptions = {
        readyListener: init,
        errorListener: function (event) {
            console.log("error:" + event);
        }
    };


    itemsApp = LearnosityItems.init(<?php echo $signedRequest; ?>, eventOptions);

    function init() {
        var assessApp = itemsApp.assessApp();

        assessApp.on('item:load', function () {
            console.log('Active item:', getActiveItem(this.getItems()));
        });

        assessApp.on('test:submit:success', function () {
            toggleModalClass();
        });

        // Uncomment if you don't want a warning when leaving the
        // page with unsaved changes
        // window.onbeforeunload = function () {
        //     return;
        // }
    }

    /**
     * Returns the active item if using the Assess API
     * @param  {object} items Object of all items currently loaded
     * @return {object}       Current active item
     */
    function getActiveItem(items) {
        for (var item in items) {
            if (items.hasOwnProperty(item) && items[item].active === true) {
                return items[item];
            }
        }
    }

    function toggleModalClass() {
        $('.modal-backdrop').css('display', 'none');
    }
</script>
<script type="text/javascript" src="regions_settings.js">
</script>
<?php
include_once 'views/modals/settings-items2.php';
include_once 'views/modals/initialisation-preview.php';
include_once 'includes/footer.php';

?>
