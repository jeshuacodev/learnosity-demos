<?php

include_once '../../../config.php';
include_once 'includes/header.php';

?>

    <div class="jumbotron section">
        <div class="toolbar">
            <ul class="list-inline">
                <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/questioneditorapi/v3/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
                <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
            </ul>
        </div>
        <div class="overview">
            <h1>Question Editor API V3 - Beta</h1>
            <p>This demo shows the Question Editor API loaded with barebones config. Refer to <a href="http://docs.learnosity.com/authoring/questioneditor/v3/quickstart">the Quick Start guide</a> and <a href="http://docs.learnosity.com/authoring/questioneditor/v3/initialisation">the Initialisation Options docs</a>.<p>
        </div>
    </div>

    <!--
    ********************************************************************
    *
    * Nav for different Question Editor API examples
    *
    ********************************************************************
    -->
    <div class="section">

        <!-- Container for the question editor api to load into -->
        <script src="https://questioneditor.vg.learnosity.com?latest"></script>
        <div class="margin-bottom-small">
            <button type="button" class="lrn-question-button btn btn-default">Question</button>
            <button type="button" class="lrn-feature-button btn btn-default">Feature</button>
        </div>
        
        <div class="my-question-editor"></div>
    </div>
    <script>


        var initOptions = {
            configuration: {
                questionsApiVersion: 'v2'
                },
            widget_metadata: {
                'hidden_attributes': ['stimulus']
                },
            /*rich_text_editor: {
             type: 'wysihtml'
             },*/
            widgetType: 'response',
            'rich_text_editor': {
                type: 'wysihtml',
                customButtons: [
                    {
                        name: 'test',
                        label: 'Super test',
                        icon: 'https://questioneditor.vg.learnosity.com/latest/vendor/ckeditor/plugins/custombuttons/icons/math.png',
                        func: function(attribute, callback) {
                            callback(" <strong>You're a genius, it's attribute " + attribute + "</strong> ");
                        },
                        attributes: ['stimulus']
                    },
                    {
                        name: 'test2',
                        label: 'Super test123',
                        icon: 'http://www.genkin.org/gallery/australia/sydney/hb/au-sydney-harbour-bridge-0038_l.jpg',
                        func: function(attribute, callback) {
                            callback(" <strong>And again!!! it's attribute " + attribute + "</strong> ");
                        }
                    }
                ]
            },
            ui: {
                layout: {
                    advanced_group: true,
                    global_template: 'edit'
                }
            }
        };

        var qeApp = LearnosityQuestionEditor.init(initOptions, '.my-question-editor');

        document.querySelector('.lrn-question-button')
            .addEventListener('click', function () {
                qeApp.reset('response');
            });

        document.querySelector('.lrn-feature-button')
            .addEventListener('click', function () {
                qeApp.reset('feature');
            });
    </script>

<?php
include_once 'views/modals/asset-upload.php';
include_once 'includes/footer.php';
