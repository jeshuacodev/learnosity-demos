<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$title = 'Assess API - events (no-iframe)';
$hidesidebar = true;
$noRelative = true;

// no iframe assess
$domain = $_SERVER['HTTP_HOST'];

function generateUuid() {
    /*
    This function is used to generate a unique session UUID.
    */
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

$session_id = generateUuid();

$consumerKey = 'Fi7WqKRj0Jb1L4NF';
$consumerSecret = 'dab76d478135e0db96ce1e3ba95ac80b87222d8b';
$userId = '12345678';
$timeStamp = gmdate('Ymd-Hi');
$signature = hash("sha256", $consumerKey . '_' . $domain . '_' . $timeStamp . '_' . $userId . '_' . $consumerSecret);
include_once 'includes/footer.php';

?>
<style type="text/css">
    .label.cb {
        -webkit-transition: all 300ms ease-in-out;
        -moz-transition: all 300ms ease-in-out;
        -ms-transition: all 300ms ease-in-out;
        -o-transition: all 300ms ease-in-out;
        transition: all 300ms ease-in-out;
        background-color: #e7e7e7;
        color: black;
    }
    .label.cb.on {
        background-color: green;
        color: white;

    }

    .assess-events-demo {
        padding-top: 20px;
        padding-bottom: 60px;
        max-width: none;
    }

    .assess-events {
        padding: 15px;
        padding-top: 0;
        font-size: 12px;
        background-color: white;
        position: relative;
        z-index: 999999;
    }

    .assess-events > div {
        margin-bottom: 3px;
    }
    .container {
        display: table;
    }
    .assess-wrapper {
        display: table-cell;
    }
</style>
<script src="<?php echo $url_assess; ?>?inline"></script>
<div class="container">
        <div class="assess-events">
            <h3> Events</h3>
            <div title="Triggered when the test is ready to be started">
                <span class="cb label label-default ev-test-ready">once</span> <span class="assess-event-name">test:ready</span>
            </div>
            <div title="Triggered when the test is started">
                <span class="cb label label-default ev-test-start">once</span> <span class="assess-event-name">test:start</span>
            </div>
            <div title="Triggered when the test is paused">
                <span class="cb label label-default ev-test-pause">on</span> <span class="assess-event-name">test:pause</span>
            </div>
            <div title="Triggered when the test is resumed">
                <span class="cb label label-default ev-test-resume">on</span> <span class="assess-event-name">test:resume</span>
            </div>
            <div title="Triggered when the time is changed">
                <span class="cb label label-default ev-time-change">on</span> <span class="assess-event-name">time:change</span>
            </div>
            <div title="Triggered when the tests starts to save the activity">
                <span class="cb label label-default ev-test-save">on</span> <span class="assess-event-name">test:save</span>
            </div>
            <div title="Triggered when the tests starts to submit the activity">
                <span class="cb label label-default ev-test-submit">on</span> <span class="assess-event-name">test:submit</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-save-success">on</span> <span class="assess-event-name">test:save:success</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-save-error">on</span> <span class="assess-event-name">test:save:error</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-submit-success">once</span> <span class="assess-event-name">test:submit:success</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-submit-error">on</span> <span class="assess-event-name">test:submit:error</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-finished-save">on</span> <span class="assess-event-name">test:finished:save</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-finished-submit">once</span> <span class="assess-event-name">test:finished:submit</span>
            </div>
            <div>
                <span class="cb label label-default ev-test-finished-discard">on</span> <span class="assess-event-name">test:finished:discard</span>
            </div>
            <hr/>
            <div>
                <span class="cb label label-default ev-item-setAttempted">on</span> <span class="assess-event-name">item:setAttempted</span>
            </div>
            <div>
                <span class="cb label label-default ev-item-warningOnChange">on</span> <span class="assess-event-name">item:warningOnChange</span>
            </div>
            <div>
                <span class="cb label label-default ev-item-goto">on</span> <span class="assess-event-name">item:goto</span>
            </div>
            <div>
                <span class="cb label label-default ev-item-changing">on</span> <span class="assess-event-name">item:changing</span>
            </div>
            <div>
                <span class="cb label label-default ev-item-changed">on</span> <span class="assess-event-name">item:changed</span>
            </div>
            <div>
                <span class="cb label label-default ev-item-load">on</span> <span class="assess-event-name">item:load</span>
            </div>
            <div>
                <span class="cb label label-default ev-item-unload">on</span> <span class="assess-event-name">item:unload</span>
            </div>
            <hr/>
            <div>
                <span class="cb label label-default ev-items-fetch">on</span> <span class="assess-event-name">items:fetch</span>
            </div>
        </div>
    <div class="assess-wrapper">
        <div class="assess-api1"></div>
    </div>
</div>


<script src="<?php echo $url_assess; ?>?inline"></script>

<script>
    var activity = {
        "items": [
            {
                "content": "<p> <strong>CCSToolbox example:</strong> <a href=\"http://ccsstoolbox.agilemind.com/parcc/highschool_3831_1.html\">http://ccsstoolbox.agilemind.com/parcc/highschool_3831_1.html</a></p><hr><div class=\"row-fluid\"><div class=\"span6\"><div class=\"lrn-highlightable\"><p>A rabbit population can increase at a rapid rate if left unchecked. Assume that 10 rabbits are put in an enclosed wildlife ranch and the rabbit population triples each year for the next 5 years, as shown in the table.</p></div></div><div class=\"span4\"><table class=\"table table-bordered\"><tr><td> <strong>Year</strong></td><td> <strong>Rabbit Population</strong></td></tr><tr><td>0</td><td>10</td></tr><tr><td>1</td><td>30</td></tr><tr><td>2</td><td>90</td></tr><tr><td>3</td><td>270</td></tr><tr><td>4</td><td>810</td></tr><tr><td>5</td><td>2430</td></tr></table></div></div><p> <strong>Part A</strong><br>Let \\(y\\) represent the number of rabbits after x years. Drag the tiles to the appropriate slots to build a function rule that could be used to model y as a function of x, where x is a non-negative integer.</p><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget56a\"></span><p> <strong>Part B</strong><br><em>New Population:</em><br> A group of rabbits of a different kind is placed in a second enclosed wildlife ranch. This new population of rabbits doubles each year if left unchecked.</p><p>Which of the following statements must be true about the model for the new rabbit population compared to the model you developed for the original rabbit population? Select all that apply.</p><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget56b\"></span>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_widget56a",
                    "<?php echo $session_id;?>_ccore_widget56b"
                ],
                "workflow": "",
                "reference": "ccore_ccs_rabbit"
            },
            {
                "content": "<p><span class=\"learnosity-feature feature-<?php echo $session_id;?>_test_video_pbn_1\"></span></p>",
                "feature_ids": [
                    "<?php echo $session_id;?>_test_video_pbn_1"
                ],
                "reference": "test_video_pbn"
            },
            {
                "content": "<div class=\"lrn-highlightable\"><p> <strong>Parcc Example:</strong> <a href=\"http://www.parcconline.org/samples/english-language-artsliteracy/grade-7-tecr-research-simulation-task\">http://www.parcconline.org/samples/english-language-artsliteracy/grade-7-tecr-research-simulation-task</a></p><hr><p>Below are three claims that one could make based on the article \"Earhart's Final Resting Place Believed Found.\"</p></div><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget32a\"></span><div class=\"lrn-highlightable\"><p> <strong>Part A</strong><br>Highlight the claim that is supported by the most relevant and sufficient evidence within \"Earhart's Final Resting Place Believed Found.</p><p> <strong>Part B</strong><br>Select two facts within the article that best provide evidence to support the claim selected in Part A.</p></div><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget32b\"></span> Lorenzi, Rosella. \"Earhart’s Final Resting Place Believed Found.\" Discovery News. Discovery News, 23 Oct. 2009. Web. 2 Feb. 2012. <a href=\"http://news.discovery.com/history/amelia-earhart-resting-place.html\">http://news.discovery.com/history/amelia-earhart-resting-place.html</a>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_widget32a",
                    "<?php echo $session_id;?>_ccore_widget32b"
                ],
                "reference": "ccore_parcc_grade7_research"
            },
            {
                "content": "<div><p> <strong>Original video from Smarter Balanced:</strong> <a href=\"http://www.youtube.com/watch?v=ugZZL6-rw6Q\">http://www.youtube.com/watch?v=ugZZL6-rw6Q</a></p><hr><p>The density of kerosene is approximately \\(0.82 \\frac{g}{mL}\\)</p><p>Drag a rate or quantity from the box to each blank to calculate the mass, in kilograms, of 20 liters of kerosene</p></div><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget10\"></span>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_widget10"
                ],
                "workflow": "",
                "reference": "ccore_maths_083_SelectAndOrder_mp4"
            },
            {
                "content": "<p> <strong>Original video from Smarter Balanced:</strong> <a href=\"http://www.youtube.com/watch?v=Aiw_jzb3D_I\">http://www.youtube.com/watch?v=Aiw_jzb3D_I</a></p><hr> Below is the beginnning of a student essay that needs to be corrected. Read the paragraph and then answer the question that follows.<br><h1>High School and Extracurricular Activities</h1><span class=\"learnosity-response question-<?php echo $session_id;?>_l_cc_widget5\"></span><br> Click on the underlined phrases in the passage and select the best way to write each phrase from the drop down menu.",
                "response_ids": [
                    "<?php echo $session_id;?>_l_cc_widget5"
                ],
                "workflow": "",
                "reference": "ccore_DropDowns_inline_cloze_mp4"
            },
            {
                "content": "<div class=\"lrn-highlightable\"><p> <strong>Original video from Smarter Balanced:</strong> <a href=\"http://youtu.be/f7kWO6sBhJk\">http://youtu.be/f7kWO6sBhJk</a></p><hr><p> <strong>My Chicken Coop</strong></p><p>During spring break from school, I helped my father build a chicken coop. We nailed together large items of wood to make a comfortable coop for our 14 chickens. We fenced in an outside pen and attached it to the coop. All we had left was to build a perch out of a long, heavy pole. This would give the chickens a pole to stand to down on their surroundings. My father and I were almost finished when my brother Mack wanted to help.</p><p> <em>This is the beginning of a story written by a student who wants to add dialouge. Decide where the three pieces of dialouge should be placed. Click on them and move them into the correct order.</em></p></div><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget21\"></span>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_widget21"
                ],
                "workflow": "",
                "reference": "ccore_002_ReorderText"
            },
            {
                "content": "<div><p> <strong>CCSToolbox example:</strong> <a href=\"http://ccsstoolbox.agilemind.com/parcc/middle_5.htmll\">http://ccsstoolbox.agilemind.com/parcc/middle_5.html</a></p><hr><p>A restaurant makes a special seasoning for all its grilled vegetables. Here is how the ingredients are mixed:<ul class=\"unstyled\"><li>\\( \\frac{1}{2} \\) the mixture is salt</li><li>\\( \\frac{1}{4} \\) the mixture is pepper</li><li>\\( \\frac{1}{8} \\) the mixture is garlic powder</li><li>\\( \\frac{1}{8} \\) the mixture is onion powder</li></ul></p></div><p> <strong>Part A</strong><br> When the ingredients are mixed in the same ratio as shown above, every batch of seasoning tastes the same.</p><p>Study the measurements for each batch in the table. Fill in the blanks so that every batch will taste the same.</p><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget51a\"></span><p> <strong>Part B</strong><br> The restaurant mixes a 12-cup batch of the mixture every week. How many cups of each ingredient do they use in the mixture each week?</p><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget51b\"></span>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_widget51a",
                    "<?php echo $session_id;?>_ccore_widget51b"
                ],
                "workflow": "",
                "reference": "ccore_css_vegies"
            },
            {
                "content": "<p> <strong>Smarter Balanced Question :</strong> <a href='http://sampleitems.smarterbalanced.org/itempreview/sbac/index.htm'>http://sampleitems.smarterbalanced.org/itempreview/sbac/index.htm</a></p><hr><img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/sbalance_online/alien.png\"><p>How many two-eyed space creatures are needed to make a group with 24 total eyes?</p><div class=\"row-fluid\"><div class=\"span2\"><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_sbalance_online_43081\"></span></div></div><p>How many three-eyed space creatures are needed to make a group with 24 total eyes?</p><div class=\"row-fluid\"><div class=\"span2\"><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_sbalance_online_43082\"></span></div></div><p>How many four-eyed space creatures are needed to make a group with 24 total eyes?</p><div class=\"row-fluid\"><div class=\"span2\"><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_sbalance_online_43083\"></span></div></div><p>Somebody told the five-eyed space creatures that they could not join the contest. Explain why five-eyed space creatures cannot make a group with 24 eyes.</p><div class=\"row-fluid\"><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_sbalance_online_43084\"></span></div>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_sbalance_online_43081",
                    "<?php echo $session_id;?>_ccore_sbalance_online_43082",
                    "<?php echo $session_id;?>_ccore_sbalance_online_43083",
                    "<?php echo $session_id;?>_ccore_sbalance_online_43084"
                ],
                "workflow": "",
                "reference": "ccore_sbalance_online_43081"
            },
            {
                "content": "<div class=\"lrn-highlightable\"><p> <strong>Original video from Smarter Balanced:</strong> <a href=\"http://www.youtube.com/watch?v=CKK7NVKPFT8\">http://www.youtube.com/watch?v=CKK7NVKPFT8</a></p><hr><p>Classify each net as representing a rectangular prism, a triangular prism or a pyramid. To place an object in a region, click the object and drag the object into the region.</p></div><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_video_590_classification\"></span>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_video_590_classification"
                ],
                "workflow": "",
                "reference": "ccore_video_590_classification"
            },
            {
                "content": "<div class=\"lrn-highlightable\"><p> <strong>CCSToolbox example:</strong><a href=\"http://ccsstoolbox.agilemind.com/parcc/middle_3815_1.html\">http://ccsstoolbox.agilemind.com/parcc/middle_3815_1.html</a></p><hr><p>A store is advertising a sale with 10% off all items in the store. Sales tax is 5%.</p><p>A 32-inch television is regularly priced at $295.00. What is the total price of the television, including sales tax, if it was purchased on sale? Fill in the blank to complete the sentence. Round your answer to the nearest cent.</p></div><span class=\"learnosity-response question-<?php echo $session_id;?>_ccore_widget52\"></span>",
                "response_ids": [
                    "<?php echo $session_id;?>_ccore_widget52"
                ],
                "workflow": "",
                "reference": "ccore_ccs_tv"
            }
        ],
        "time": {
            "max_time": 600,
            "limit_type": "soft",
            "show_pause": true,
            "warning_time": 60,
            "show_time": true
        },
        "labelBundle": {
            "appName": "Ember Education",
            "item": "Question",
            "saveButtonLabel": "Save"
        },
        "navigation": {
            "scroll_to_top": false,
            "scroll_to_test": false,
            "outro_item": {
                "content": "Your test has been successfully submitted. Please contact us if you have any questions about this product."
            }
        },
        "regions": "main",
        "texthighlight": {
            'enable': true
        },
        "title": 'Demo Test (9 questions)',
        "name": "Demo (9 questions)",
        "subtitle": "Walter White",
        "state": "initial",
        "questionsApiActivity": {
            "consumer_key": "<?php echo $consumerKey; ?>",
            "session_id": "<?php echo $session_id;?>",
            "state": "initial",
            "beta_flags": {
                "reactive_views": true
            },
            "questions": [
                {
                    "template": "\\(y\\) = {{response}} {{response}} {{response}}",
                    "valid_responses": [
                        [
                            {
                                "score": 1,
                                "value": "10"
                            },
                            {
                                "score": 1,
                                "value": "\\(3 ^ x \\)"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "\\(  \\cdot \\)"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "\\(3 ^ x \\)"
                            },
                            {
                                "score": 1,
                                "value": "10"
                            }
                        ]
                    ],
                    "description": "<strong>Drag &amp; Drop</strong><p>Drag the tiles to the appropriate slots to build a function rule that could be used to model y as a function of x, where x is a non-negative integer.</p>",
                    "is_math": true,
                    "type": "clozeassociation",
                    "possible_responses": [
                        "\\(3x \\)",
                        "\\(3 ^ x \\)",
                        "\\(x ^ 3 \\)",
                        "\\( x\\)",
                        "\\(0 \\)",
                        "\\( 3\\)",
                        "\\( 10\\)",
                        "\\( 30\\)",
                        "\\(  \\cdot \\)",
                        "\\( + \\)"
                    ],
                    "metadata": {
                        "widget_reference": "ccore_widget56a",
                        "item_reference": "ccore_ccs_rabbit"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget56a"
                },
                {
                    "valid_responses": [
                        {
                            "score": 1,
                            "value": "a"
                        },
                        {
                            "score": 1,
                            "value": "d"
                        }
                    ],
                    "ui_style": {
                        "columns": 2,
                        "type": "horizontal"
                    },
                    "is_math": true,
                    "multiple_responses": true,
                    "type": "mcq",
                    "metadata": {
                        "widget_reference": "ccore_widget56b",
                        "item_reference": "ccore_ccs_rabbit"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget56b",
                    "options": [
                        {
                            "value": "a",
                            "label": "The base of the exponent will change from 3 to 2."
                        },
                        {
                            "value": "b",
                            "label": "The function rule will be quadratic"
                        },
                        {
                            "value": "c",
                            "label": "The coefficient will become 2"
                        },
                        {
                            "value": "d",
                            "label": "As the number of years increases, the graph of this model will be less steep than the graph of the original model."
                        },
                        {
                            "value": "e",
                            "label": "The \\(y\\)-intercept fo the model will be different."
                        },
                        {
                            "value": "f",
                            "label": "As the number of years increases, the graph of this model will be steeper than the graph of the original model."
                        }
                    ]
                },
                {
                    "template": "Earhart and Noonan lived as castaways on Nikumaroro Island.<br> Earhart and Noonan's plane crashed into the Pacific Ocean.<br> <valid>People don't know really know where Earhart and Noonan died.</valid>",
                    "validation": {
                        "penalty_score": "0",
                        "partial_scoring": "true",
                        "valid_score": "0"
                    },
                    "description": "<strong>Highlight Text</strong><p>Highlight the claim that is supported by the most relevant and sufficient evidence within \"Earhart's Final Resting Place Believed Found.</p>",
                    "word_bound": false,
                    "type": "texthighlight",
                    "metadata": {
                        "widget_reference": "ccore_widget32a",
                        "item_reference": "ccore_parcc_grade7_research"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget32a"
                },
                {
                    "description": "<strong>Long Text</strong><p>Select two facts within the article that best provide evidence to support the claim selected in Part A.</p>",
                    "type": "longtext",
                    "metadata": {
                        "widget_reference": "ccore_widget32b",
                        "item_reference": "ccore_parcc_grade7_research"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget32b"
                },
                {
                    "template": "{{response}} x {{response}} x {{response}} x {{response}}",
                    "valid_responses": [
                        [
                            {
                                "score": 1,
                                "value": "\\(20 L\\)"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "\\(\\frac{0.82 g}{1 mL}\\)"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "\\(\\frac{1 kg}{1,000 g}\\)"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "\\(\\frac{1,000 mL}{1 L}\\)"
                            }
                        ]
                    ],
                    "description": "<strong>Drag &amp; Drop</strong><p>Drag a rate or quantity from the box to each blank to calculate the mass, in kilograms, of 20 liters of kerosene</p>",
                    "is_math": true,
                    "response_container": {
                        "width": "75px"
                    },
                    "type": "clozeassociation",
                    "possible_responses": [
                        "\\(\\frac{1,000 mL}{1 L}\\)",
                        "\\(\\frac{1 kg}{1,000 g}\\)",
                        "\\(\\frac{0.82 g}{1 mL}\\)",
                        "\\(20 L\\)",
                        "\\(820 L\\)",
                        "\\(820 kg\\)",
                        "\\(2,000 mL\\)",
                        "\\(\\frac{2,000 mL}{20 L}\\)",
                        "\\(\\frac{1 L}{1,000 mL}\\)",
                        "\\(\\frac{1,000 g}{1 kg}\\)",
                        "\\(\\frac{1 kg}{1,000 L}\\)",
                        "\\(\\frac{1,000 L}{1 kg}\\)"
                    ],
                    "metadata": {
                        "widget_reference": "ccore_widget10",
                        "item_reference": "ccore_maths_083_SelectAndOrder_mp4"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget10"
                },
                {
                    "template": "Extracurricular activities, such as clubs and sports, {{response}} of any high school education. Some people argue that clubs and activities area a waste of time {{response}} more important academic pursuits but studies have shown that students involved in extracurricular activities are more likely to graduate and earn better grades than students who don't participate. Clubs, activities, and sports teams help students stay focused, build school spirit and unity, and provide a way to make freiends in the daunting high school social environment (Rombakas, 1995). Is is true that {{response}} of their school, feel like they belong, and have activites to look forward to arre the ones who care most about their grades and stay in school.",
                    "valid_responses": [
                        [
                            {
                                "score": 1,
                                "value": "are an essential component"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "and distract students from"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "academics area high school's primary role; however, the students who are proud"
                            }
                        ]
                    ],
                    "description": "<strong>Drop Down</strong><p>Select the best phrase from the drop down menu to complete the passage.</p>",
                    "type": "clozedropdown",
                    "possible_responses": [
                        [
                            "were an essential component",
                            "are an essential component",
                            "will be an essential component",
                            "is an essential component"
                        ],
                        [
                            "and distract the student from",
                            "and distract you from",
                            "and distract one from",
                            "and distract students from"
                        ],
                        [
                            "academics are a high school's primary role; however, the students who are proud",
                            "academics are a high school's primary role; however, the students who are proud",
                            "academics are a high school's primary role even though the students who are proud",
                            "academics are a high school's primary role; even though the students who are proud"
                        ]
                    ],
                    "metadata": {
                        "widget_reference": "l_cc_widget5",
                        "item_reference": "ccore_DropDowns_inline_cloze_mp4"
                    },
                    "response_id": "<?php echo $session_id;?>_l_cc_widget5"
                },
                {
                    "validation": {
                        "penalty_score": "0",
                        "partial_scoring": "true",
                        "valid_score": "1",
                        "valid_response": [
                            2,
                            1,
                            0
                        ],
                        "pairwise": "0"
                    },
                    "description": "<strong>Order List</strong><br> Decide where the three pieces of dialogue should be placed. Click on them and move them into the correct order.",
                    "ui_style": "inline",
                    "list": [
                        "\"Deal,\" Mack said as he picked up the pole. <br> \"Hold the pole steady Mack,\" Dad said.<br>",
                        "I looked at my father, waiting for him to answer. This was our special project, but Mack could lift heavy boards better than I could.<br>",
                        "\"Can I build the coop with you?\" asked Mack. <br> \"OK, but your sister gets to bring out the chickens to and put them in their new home,\" my father agreed. <br>"
                    ],
                    "type": "orderlist",
                    "metadata": {
                        "widget_reference": "ccore_widget21",
                        "item_reference": "ccore_002_ReorderText"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget21"
                },
                {
                    "max_length": 3,
                    "template": "<table><tr><th></th><th>Batch 1</th><th>Batch 2</th><th>Batch 3</th></tr><tr><td>Salt (cups)</td><td>1</td><td>{{response}}</td><td>{{response}}</td></tr><tr><td>Pepper (cups)</td><td>{{response}}</td><td>1</td><td>{{response}}</td></tr><tr><td>Garlic Powder (cups)</td><td>\\( \\frac{1}{4} \\)</td><td>{{response}}</td><td>1</td></tr><tr><td>Onion Powder (cups)</td><td>{{response}}</td><td>{{response}}</td><td>1</td></tr></table>",
                    "valid_responses": [
                        [
                            {
                                "score": 1,
                                "value": "2"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "4"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "1/2"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "2"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "1/2"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "1/4"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "1/2"
                            }
                        ]
                    ],
                    "description": "<strong>Fill in the blanks</strong><p>Study the measurements for each batch in the table. Fill in the blanks so that every batch will taste the same.</p>",
                    "is_math": true,
                    "type": "clozetext",
                    "metadata": {
                        "widget_reference": "ccore_widget51a",
                        "item_reference": "ccore_css_vegies"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget51a"
                },
                {
                    "max_length": 3,
                    "template": "{{response}} cups salt<br> {{response}} cups pepper<br> {{response}} cups garlic powder<br> {{response}} cups onion powder",
                    "valid_responses": [
                        [
                            {
                                "score": 1,
                                "value": "6"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "3"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "1.5"
                            }
                        ],
                        [
                            {
                                "score": 1,
                                "value": "1.5"
                            }
                        ]
                    ],
                    "description": "<strong>Fill in the blanks</strong><p>The restaurant mixes a 12-cup batch of the mixture every week. How many cups of each ingredient do they use in the mixture each week?</p>",
                    "type": "clozetext",
                    "metadata": {
                        "widget_reference": "ccore_widget51b",
                        "item_reference": "ccore_css_vegies"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget51b"
                },
                {
                    "max_length": 10,
                    "valid_responses": [
                        {
                            "score": 1,
                            "value": "12"
                        }
                    ],
                    "description": "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/sbalance_online/alien.png\"><p>How many two-eyed space creatures are needed to make a group with 24 total eyes?</p>",
                    "type": "shorttext",
                    "metadata": {
                        "widget_reference": "ccore_sbalance_online_43081",
                        "item_reference": "ccore_sbalance_online_43081"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_sbalance_online_43081"
                },
                {
                    "valid_responses": [
                        {
                            "score": 1,
                            "value": "8"
                        }
                    ],
                    "description": "<p>How many three-eyed space creatures are needed to make a group with 24 total eyes?</p>",
                    "type": "shorttext",
                    "metadata": {
                        "widget_reference": "ccore_sbalance_online_43082",
                        "item_reference": "ccore_sbalance_online_43081"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_sbalance_online_43082"
                },
                {
                    "valid_responses": [
                        {
                            "score": 1,
                            "value": "6"
                        }
                    ],
                    "description": "<p>How many four-eyed space creatures are needed to make a group with 24 total eyes?</p>",
                    "type": "shorttext",
                    "metadata": {
                        "widget_reference": "ccore_sbalance_online_43083",
                        "item_reference": "ccore_sbalance_online_43081"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_sbalance_online_43083"
                },
                {
                    "description": "<p>Somebody told the five-eyed space creatures that they could not join the contest. Explain why five-eyed space creatures cannot make a group with 24 eyes.</p>",
                    "type": "plaintext",
                    "metadata": {
                        "widget_reference": "ccore_sbalance_online_43084",
                        "item_reference": "ccore_sbalance_online_43081"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_sbalance_online_43084"
                },
                {
                    "validation": {
                        "valid_responses": [
                            [
                                [
                                    1,
                                    2
                                ],
                                [
                                    3,
                                    5
                                ],
                                [
                                    0,
                                    4
                                ]
                            ]
                        ],
                        "penalty_score": 0,
                        "partial_scoring": "element",
                        "valid_score": 1
                    },
                    "description": "<strong>Classification</strong><p>Classify each net as representing a rectangular prism, a triangular prism or a pyramid.</p>",
                    "ui_style": {
                        "column_titles": [
                            "Nets Forming a Rectangular Prism",
                            "Nets Forming a Triangular Prism",
                            "Nets Forming a Pyramid"
                        ],
                        "column_count": 3
                    },
                    "type": "classification",
                    "possible_responses": [
                        "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/net1.png\">",
                        "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/net2.png\">",
                        "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/net3.png\">",
                        "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/net4.png\">",
                        "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/net5.png\">",
                        "<img src=\"https://s3.amazonaws.com/assets.learnosity.com/organisations/1/net6.png\">"
                    ],
                    "metadata": {
                        "widget_reference": "ccore_video_590_classification",
                        "item_reference": "ccore_video_590_classification"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_video_590_classification"
                },
                {
                    "max_length": 7,
                    "template": "The total cost of the television is ${{response}}",
                    "valid_responses": [
                        [
                            {
                                "score": 1,
                                "value": "278.77"
                            },
                            {
                                "score": 1,
                                "value": "278.78"
                            }
                        ]
                    ],
                    "description": "<strong>Fill in the blanks</strong><p>A store is advertising a sale with 10% off all items in the store. Sales tax is 5%.</p><p>A 32-inch television is regularly priced at $295.00. What is the total price of the television, including sales tax, if it was purchased on sale? Fill in the blank to complete the sentence. Round your answer to the nearest cent.</p>",
                    "type": "clozetext",
                    "metadata": {
                        "widget_reference": "ccore_widget52",
                        "item_reference": "ccore_ccs_tv"
                    },
                    "response_id": "<?php echo $session_id;?>_ccore_widget52"
                }
            ],
            "features": [
                {
                    "src": "http://s3.amazonaws.com/parccitems_convert/items/108/4e183f1f-7621-4fd2-95c1-dd3c00c622bf/assets/Amelia-Earhart.webm",
                    "type": "videoplayer",
                    "metadata": {
                        "widget_reference":"test_video_pbn_1",
                        "item_reference": "test_video_pbn"
                    },
                    "feature_id": "<?php echo $session_id;?>_test_video_pbn_1"

                }
            ],
            "type": "submit_practice",
            "id": "fffcf70e-4165-f907-b6eadc9813bdc56",
            "timestamp": "<?php echo $timeStamp; ?>",
            "signature": "<?php echo $signature; ?>",
            "user_id": "<?php echo $userId; ?>",
            "description": "Maths, English, Maths",
            "name": "Demo (9 questions)",
            "course_id": "commoncore"
        },
        "metadata": {},
        "configuration": {
            "onsubmit_redirect_url": "/assessment/",
            "onsave_redirect_url": "/assessment/",
            "idle_timeout": true,
            "questionsApiVersion": "v2",
            "preload_audio_player": false
        },
        "administration": {
            "pwd": "a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3"  // SHA256 for "123"
        }
    };
    var assessApp = LearnosityAssess.init(activity, ".assess-api1", {
        readyListener: function () {
            console.log("readyListener", arguments);
        },
        errorListener: function () {
            console.log("errorListener", arguments);
        }
    });


    assessApp.on('all', function (eventName) {
        var $el = $('.assess-event-name:contains("' + eventName + '")').prev('.label');

        if (!$el.length) {
            $el = $('<div><span class="cb label label-default ">on</span> <span class="assess-event-name">' + eventName + '</span></div>');

            $('.assess-events').append($el);

            $el = $el.find('.label');
        }

        // Toggle class event
        $el.addClass('on');
        setTimeout(function () {
            $el.removeClass('on');
        }, 800);
    });
</script>
