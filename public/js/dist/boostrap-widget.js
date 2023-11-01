/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


function myPlugin(editor) {

    editor.BlockManager.add('button-block', {
        label: '<span class="icn-block fa fa-square"></span></br></br>Button',

        content: '<button class="btn btn-default" type="button">Button</button>'
    });

    editor.BlockManager.add('image-block', {
        label: '<span class="icn-block fa fa-file-image-o"></span></br></br>Image Rounded',

        content: '<img src="..." alt="..." class="img-rounded">'
    });
    
    editor.BlockManager.add('image-circle-block', {
        label: '<span class="icn-block fa fa-file-image-o"></span></br></br>Image Circle',

        content: '<img src="..." alt="..." class="img-circle">'
    });
    
    editor.BlockManager.add('image-thumb-block', {
        label: '<span class="icn-block fa fa-file-image-o"></span></br></br>Image Thumbnail',

        content: '<img src="..." alt="..." class="img-thumbnail">'
    });

    editor.BlockManager.add('Title-block', {
        label: '<span class="icn-block fa fa-text-height"></span></br></br>Header Title',

        content: '<h1>Sample Title</h1>'
    });
    
    editor.BlockManager.add('footer-block', {
        label: '<span class="icn-block fa fa-file-o"></span></br></br>Footer',

        content: '<div class="footer-dark"><footer><div class="container"><div class="row"><div class="col-md-6 col-md-push-6 item text"><h3>Company Name</h3><p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p></div><div class="col-md-3 col-md-pull-6 col-sm-4 item"><h3>Services</h3><ul><li><a href="#">Web design</a></li><li><a href="#">Development</a></li><li><a href="#">Hosting</a></li></ul></div><div class="col-md-3 col-md-pull-6 col-sm-4 item"><h3>About</h3><ul><li><a href="#">Company</a></li><li><a href="#">Team</a></li><li><a href="#">Careers</a></li></ul></div><div class="col-md-12 col-sm-4 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div></div><p class="copyright">Company Name © 2016</p></div></footer></div>'
    });
    
//    editor.BlockManager.add('two-column-block', {
//        label: '<span class="icn-block fa fa-columns"></span></br></br>Two Column',
//
//        content: '<div class="row row-section"></div>'
//    });





//      editor.BlockManager.add('footer-contact-us', {
//        label: '<span class="icn-block fa fa-floppy-o"></span></br>footer contact us',
//        
//        content: '<div class="jumbotron text-center"><h1>Company</h1><p>We specialize in blablabla</p><form class="form-inline"><div class="input-group"><input type="email" class="form-control" size="50" placeholder="Email Address" required><div class="input-group-btn"><button type="button" class="btn btn-danger">Subscribe</button></div></div></form></div>',
//      });
//      
//      editor.BlockManager.add('info-graphic', {
//        label: 'info graphic',
//        content: '<div class="container-fluid text-center"><h2>SERVICES</h2><h4>What we offer</h4><br><div class="row"><div class="col-sm-4"><span class="glyphicon glyphicon-off logo-small"></span><h4>POWER</h4><p>Lorem ipsum dolor sit amet..</p></div><div class="col-sm-4"><span class="glyphicon glyphicon-heart logo-small"></span><h4>LOVE</h4><p>Lorem ipsum dolor sit amet..</p></div><div class="col-sm-4"><span class="glyphicon glyphicon-lock logo-small"></span><h4>JOB DONE</h4><p>Lorem ipsum dolor sit amet..</p></div></div><br><br><div class="row"><div class="col-sm-4"><span class="glyphicon glyphicon-leaf logo-small"></span><h4>GREEN</h4><p>Lorem ipsum dolor sit amet..</p></div><div class="col-sm-4"><span class="glyphicon glyphicon-certificate logo-small"></span><h4>CERTIFIED</h4><p>Lorem ipsum dolor sit amet..</p></div><div class="col-sm-4"><span class="glyphicon glyphicon-wrench logo-small"></span><h4 style="color:#303030">HARD WORK</h4><p>Lorem ipsum dolor sit amet..</p></div></div></div>',
//      });
//      
//      editor.BlockManager.add('sample-portfolio', {
//        label: 'Sample Portfolio',
//        content: '<div class="container-fluid text-center bg-grey"><h2>Portfolio</h2><h4>What we have created</h4><div class="row text-center"><div class="col-sm-4"><div class="thumbnail"><img src="paris.jpg" alt="Paris"><p><strong>Paris</strong></p><p>Yes, we built Paris</p></div></div><div class="col-sm-4"><div class="thumbnail"><img src="newyork.jpg" alt="New York"><p><strong>New York</strong></p><p>We built New York</p></div></div><div class="col-sm-4"><div class="thumbnail"><img src="sanfran.jpg" alt="San Francisco"><p><strong>San Francisco</strong></p><p>Yes, San Fran is ours</p></div></div></div>',
//      });
//      
//      editor.BlockManager.add('sample-slider', {
//        label: 'Sample Slider',
//        content: '<div id="myCarousel" class="carousel slide text-center" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#myCarousel" data-slide-to="0" class="active"></li><li data-target="#myCarousel" data-slide-to="1"></li><li data-target="#myCarousel" data-slide-to="2"></li></ol><div class="carousel-inner" role="listbox"><div class="item active"><h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4></div><div class="item"><h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4></div><div class="item"><h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4></div></div><a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>',
//      });
//      
//      editor.BlockManager.add('sample-price-section', {
//        label: 'Sample Price Section',
//        content: '<div class="container-fluid"><div class="text-center"><h2>Pricing</h2><h4>Choose a payment plan that works for you</h4></div><div class="row"><div class="col-sm-4"><div class="panel panel-default text-center"><div class="panel-heading"><h1>Basic</h1></div><div class="panel-body"><p><strong>20</strong>Lorem</p><p><strong>15</strong>Ipsum</p><p><strong>5</strong>Dolor</p><p><strong>2</strong>Sit</p><p><strong>Endless</strong>Amet</p></div><div class="panel-footer"><h3>$19</h3><h4>per month</h4><button class="btn btn-lg">Sign Up</button></div></div></div><div class="col-sm-4"><div class="panel panel-default text-center"><div class="panel-heading"><h1>Pro</h1></div><div class="panel-body"><p><strong>50</strong>Lorem</p><p><strong>25</strong>Ipsum</p><p><strong>10</strong>Dolor</p><p><strong>5</strong>Sit</p><p><strong>Endless</strong>Amet</p></div><div class="panel-footer"><h3>$29</h3><h4>per month</h4><button class="btn btn-lg">Sign Up</button></div></div></div><div class="col-sm-4"><div class="panel panel-default text-center"><div class="panel-heading"><h1>Premium</h1></div><div class="panel-body"><p><strong>100</strong>Lorem</p><p><strong>50</strong>Ipsum</p><p><strong>25</strong>Dolor</p><p><strong>10</strong>Sit</p><p><strong>Endless</strong>Amet</p></div><div class="panel-footer"><h3>$49</h3><h4>per month</h4><button class="btn btn-lg">Sign Up</button></div></div></div></div></div>',
//      });
//      
//      editor.BlockManager.add('sample-price-section2', {
//        label: 'Sample Price Section',
//        content: '<div class="container-fluid"><div class="text-center"><h2>Pricing</h2><h4>Choose a payment plan that works for you</h4></div><div class="row"><div class="col-sm-4"><div class="panel panel-default text-center"><div class="panel-heading"><h1>Basic</h1></div><div class="panel-body"><p><strong>20</strong>Lorem</p><p><strong>15</strong>Ipsum</p><p><strong>5</strong>Dolor</p><p><strong>2</strong>Sit</p><p><strong>Endless</strong>Amet</p></div><div class="panel-footer"><h3>$19</h3><h4>per month</h4><button class="btn btn-lg">Sign Up</button></div></div></div><div class="col-sm-4"><div class="panel panel-default text-center"><div class="panel-heading"><h1>Pro</h1></div><div class="panel-body"><p><strong>50</strong>Lorem</p><p><strong>25</strong>Ipsum</p><p><strong>10</strong>Dolor</p><p><strong>5</strong>Sit</p><p><strong>Endless</strong>Amet</p></div><div class="panel-footer"><h3>$29</h3><h4>per month</h4><button class="btn btn-lg">Sign Up</button></div></div></div><div class="col-sm-4"><div class="panel panel-default text-center"><div class="panel-heading"><h1>Premium</h1></div><div class="panel-body"><p><strong>100</strong>Lorem</p><p><strong>50</strong>Ipsum</p><p><strong>25</strong>Dolor</p><p><strong>10</strong>Sit</p><p><strong>Endless</strong>Amet</p></div><div class="panel-footer"><h3>$49</h3><h4>per month</h4><button class="btn btn-lg">Sign Up</button></div></div></div></div></div>',
//      });
//      
//      editor.BlockManager.add('sample-button', {
//        label: 'Sample Button',
//        content: '<button type="button" class="btn btn-default">Default</button>',
//      });
//      
//      editor.BlockManager.add('sample-button-warning', {
//        label: 'Sample Button-warning',
//        content: '<button type="button" class="btn btn-warning">Default</button>',
//      });


}