        <!-- liteAccordion css -->
        <link href="style/liteaccordion.css" rel="stylesheet" />

        <!-- jQuery -->        
        <script src="js/jquery.min.js"></script>

        <!-- easing -->
        <script src="js/jquery.easing.1.3.js"></script>

        <!-- liteAccordion js -->
        <script src="js/liteaccordion.jquery.js"></script>

        <!--[if lt IE 9]>
            <script>
                document.createElement('figure');
                document.createElement('figcaption');           
            </script>
        <![endif]-->         
    </head>
    <body>

        <div id="four">
            <ol>
                <li>
                    <h2><span>Slide One</span></h2>
                    <div>
                        <img src="img-demo/1.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Two</span></h2>
                    <div>
                        <img src="img-demo/2.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Three</span></h2>
                    <div>
                        <img src="img-demo/3.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Four</span></h2>
                    <div>
                        <img src="img-demo/4.jpg" width="768" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Five</span></h2>
                    <div>
                        <img src="img-demo/5.jpg" alt="image" />
                    </div>
                </li>
            </ol>
            <noscript>
                <p>Please enable JavaScript to get the full experience.</p>
            </noscript>
        </div>

        <script>
            (function($) {
              
                $('#four').liteAccordion({ theme : 'light', firstSlide : 1, easing: 'easeOutBounce', activateOn: 'mouseover', rounded : true, autoPlay : true,cycleSpeed : 600, pauseOnHover : true, easing : 'swing'});
            })(jQuery);  
        </script>

    </body>
</html>