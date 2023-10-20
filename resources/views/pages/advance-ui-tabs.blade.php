{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Tabs')

{{-- page content --}}
@section('content')
<div class="section">
   <div class="card">
      <div class="card-content">
         <p class="caption mb-0">
            The tabs structure consists of an unordered list of tabs that have hashes corresponding to tab ids. Then
            when you
            click on each tab, only the container with the corresponding tab id will become visible.
         </p>
      </div>
   </div>

   <!--Basic Tabs-->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="basic-tabs" class="card card card-default scrollspy">
            <div class="card-content">
               <div class="card-title">
                  <div class="row">
                     <div class="col s12 m6 l10">
                        <h4 class="card-title">Basic Tabs</h4>
                        <p>
                           When you click on each tab, only the container with the corresponding tab id will become
                           visible.
                        </p>
                     </div>
                     <div class="col s12 m6 l2">
                        <ul class="tabs">
                           <li class="tab col m4 s12 p-0"><a class="active p-0" href="#main-view">View</a></li>
                           <li class="tab col m4 s12 p-0"><a class="p-0" href="#html-view">Html</a></li>
                           <li class="tab col m4 s12 p-0"><a class="p-0" href="#js-view">JS</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12">
                     <div class="row" id="main-view">
                        <div class="col s12">
                           <ul class="tabs tab-demo z-depth-1">
                              <li class="tab col m3"><a class="active" href="#test1">Test 1</a></li>
                              <li class="tab col m3"><a href="#test2">Test 2</a></li>
                              <li class="tab col m3"><a href="#test3">Test 3</a></li>
                              <li class="tab col m3"><a href="#test4">Test 4</a></li>
                           </ul>
                        </div>
                        <div class="col s12">
                           <div id="test1" class="col s12">
                              <p class="mt-2 mb-2">
                                 Oat cake oat cake marzipan macaroon fruitcake. Ice cream gummi bears ice cream ice
                                 cream
                                 danish jelly beans caramels tootsie roll. Pie macaroon croissant tart cake jelly beans
                                 fruitcake.
                              </p>
                           </div>
                           <div id="test2" class="col s12">
                              <p class="mt-2 mb-2">
                                 Pudding chocolate bear claw dragée biscuit. Jelly powder cake. Liquorice biscuit donut
                                 jelly-o chocolate. Liquorice cake gummies tart cupcake.
                              </p>
                           </div>
                           <div id="test3" class="col s12">
                              <p class="mt-2 mb-2">
                                 Cupcake ipsum dolor sit amet. Powder donut cake. Pudding toffee jujubes marzipan
                                 pudding.
                              </p>
                           </div>
                           <div id="test4" class="col s12">
                              <p class="mt-2 mb-2">
                                 Brownie marshmallow sweet macaroon. Danish carrot cake chocolate bar dessert croissant
                                 toffee pie caramels. Bonbon tart croissant chupa chups dessert.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="html-view">
                  <pre><code class="language-markup">
    &lt;div class="row">
      &lt;div class="col s12">
        &lt;ul class="tabs">
          &lt;li class="tab col m3">&lt;a href="#test1">Test 1&lt;/a>&lt;/li>
          &lt;li class="tab col m3">&lt;a class="active" href="#test2">Test 2&lt;/a>&lt;/li>
          &lt;li class="tab col sm disabled">&lt;a href="#test3">Disabled Tab&lt;/a>&lt;/li>
          &lt;li class="tab col m3">&lt;a href="#test4">Test 4&lt;/a>&lt;/li>
        &lt;/ul>
      &lt;/div>
      &lt;div id="test1" class="col s12">Test 1&lt;/div>
      &lt;div id="test2" class="col s12">Test 2&lt;/div>
      &lt;div id="test3" class="col s12">Test 3&lt;/div>
      &lt;div id="test4" class="col s12">Test 4&lt;/div>
    &lt;/div>
    </code></pre>
               </div>

               <div id="js-view">
                  <pre><code class="language-javascript">
    $(document).ready(function(){
      $('tabs').tabs();
    });
    </code></pre>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--Fixed Width Tabs-->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="Fixed-width-tabs" class="card card card-default scrollspy">
            <div class="card-content">
               <h4 class="card-title">Fixed Width Tabs</h4>
               <div class="col s12">
                  <p>Add the <a>.tabs-fixed-width</a> class</p>
               </div>
               <div class="row">
                  <div class="col s12">
                     <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
                        <li class="tab"><a href="#test40">Test 1</a></li>
                        <li class="tab"><a class="active" href="#test5">Test 2</a></li>
                        <li class="tab disabled"><a href="#test">Disabled Tab</a></li>
                        <li class="tab"><a href="#test6">Test 4</a></li>
                        <li class="tab"><a href="#test7">Test 5</a></li>
                     </ul>
                  </div>
                  <div class="col s12">
                     <div id="test40" class="col s12">
                        <p class="mt-2 mb-2">
                           Fruitcake lemon drops tootsie roll liquorice sugar plum wafer tiramisu. Gummies lollipop
                           chocolate
                           macaroon donut cake cookie oat cake. Jelly-o lollipop topping dragée.
                        </p>
                     </div>
                     <div id="test5" class="col s12">
                        <p class="mt-2 mb-2">
                           Sugar plum sugar plum carrot cake. Cupcake topping marshmallow sweet roll bear claw sugar
                           plum
                           jelly beans. Jelly-o chocolate muffin.
                        </p>
                     </div>
                     <div id="test6" class="col s12">
                        <p class="mt-2 mb-2">
                           Cupcake ipsum dolor. Sit amet cookie gummies lollipop topping soufflé. Tootsie roll brownie
                           gummi
                           bears jelly beans danish caramels jelly beans.
                        </p>
                     </div>
                     <div id="test7" class="col s12">
                        <p class="mt-2 mb-2">
                           Cupcake ipsum dolor sit amet. Wafer jelly beans candy canes. Bonbon dragée sweet roll
                           gingerbread
                           muffin caramels sweet. Croissant marshmallow tootsie roll lollipop chocolate.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--Scrollable Tabs-->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="Scrollable-tabs" class="card card card-default scrollspy">
            <div class="card-content">
               <h4 class="card-title">Scrollable Tabs</h4>
               <div class="row">
                  <div class="col s12">
                     <p>Tabs automatically become scrollable</p>
                  </div>
                  <div class="col s12">
                     <ul class="tabs tab-demo z-depth-1">
                        <li class="tab"><a href="#test8">Test 1</a></li>
                        <li class="tab"><a class="active" href="#test9">Test 2</a></li>
                        <li class="tab"><a href="#test10">Test 4</a></li>
                        <li class="tab"><a href="#test11">Test 1</a></li>
                        <li class="tab"><a class="active" href="#test12">Test 2</a></li>
                        <li class="tab disabled"><a href="#test13">Disabled Tab</a></li>
                        <li class="tab"><a href="#test14">Test 4</a></li>
                        <li class="tab"><a href="#test15">Test 1</a></li>
                        <li class="tab"><a class="active" href="#test16">Test 2</a></li>
                        <li class="tab col sm disabled"><a href="#test17">Disabled Tab</a></li>
                        <li class="tab"><a href="#test18">Test 1</a></li>
                        <li class="tab"><a href="#test14">Test 2</a></li>
                        <li class="tab"><a href="#test14">Test 3</a></li>
                        <li class="tab"><a href="#test14">Test 4</a></li>
                        <li class="tab"><a href="#test14">Test 5</a></li>
                        <li class="tab"><a href="#test14">Test 6</a></li>
                        <li class="tab"><a href="#test14">Test 7</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- jQuery Plugin Methods -->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="methods" class="card card card-default scrollspy">
            <div class="card-content">
               <h4 class="card-title">jQuery Plugin Methods</h4>
               <div class="row">
                  <div class="col s12">
                     <p>
                        You can programmatically trigger a tab change with our
                        <code class="language-javascript">select</code> method. You have to input the id of the tab you
                        want
                        to switch to. In the case of our demo it would be either test1, test2, test3, or test4.
                     </p>
                  </div>
                  <div class="col s12">
                     <pre><code class="language-javascript">
instance.select('tab_id');
              </code></pre>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- jQuery Plugin Options -->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="jquery-plugin" class="card card card-default scrollspy">
            <div class="card-content">
               <h4 class="card-title">jQuery Plugin Options</h4>
               <div class="row">
                  <div class="col s12">
                     <p>
                        You can programmatically trigger a tab change with our
                        <code class="language-javascript">select</code> method. You have to input the id of the tab you
                        want
                        to switch to. In the case of our demo it would be either test1, test2, test3, or test4.
                     </p>
                  </div>
                  <table class="highlight">
                     <thead>
                        <tr>
                           <th>Option Name</th>
                           <th>Description</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>onShow</td>
                           <td>
                              Execute a callback function when the tab is changed. <br />
                              The callback provides a parameter which refers to the current tab being shown.
                           </td>
                        </tr>
                        <tr>
                           <td>swipeable</td>
                           <td>
                              Set to true to enable swipeable tabs. This also uses the responsiveThreshold option.
                              Default:
                              false
                           </td>
                        </tr>
                        <tr>
                           <td>responsiveThreshold</td>
                           <td>
                              The maximum width of the screen, in pixels, where the swipeable functionality initializes.
                              Default: Infinity
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- External Link -->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="external-page" class="card card card-default scrollspy">
            <div class="card-content">
               <h4 class="header">Linking to an External Page</h4>
               <div class="row">
                  <div class="col s12">
                     <p>
                        By default, Materialize tabs will ignore their default anchor behaviour. To force a tab to
                        behave as
                        a regular hyperlink, just specify the <code class="language-markup">target</code> property of
                        that
                        link! A list of <code class="language-markup">target</code> values may be
                        <a href="https://www.w3schools.com/tags/att_a_target.asp">found here</a>.
                     </p>
                  </div>
                  <div class="col s12">
                     <pre><code class="language-markup col s12">
    &lt;li class="tab col s2">
      &lt;a target="_blank" href="https://github.com/Dogfalo/materialize">External link in new window&lt;/a>
    &lt;/li>
    &lt;li class="tab col s2">
      &lt;a target="_self" href="https://github.com/Dogfalo/materialize">External link in same window&lt;/a>
    &lt;/li>
  </code></pre>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--Preselecting a tab-->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="preselecting" class="card card card-default scrollspy">
            <div class="card-content">
               <div class="card-title">
                  <div class="row">
                     <div class="col s12 m6 l10">
                        <h4 class="card-title">Preselecting a tab</h4>
                        <p>
                           When you click on each tab, only the container with the corresponding tab id will become
                           visible.
                        </p>
                     </div>
                     <div class="col s12 m6 l2">
                        <ul class="tabs">
                           <li class="tab col m6 s12 p-0"><a class="active p-0" href="#main-view-tab">View</a></li>
                           <li class="tab col m6 s12 p-0"><a class="p-0" href="#html-view-tab">Html</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col s12">
                     <p>
                        By default, the first tab is selected. But if this is not what you want, you can preselect a tab
                        by
                        either passing in the hash in the url ex:<code class=" language-markup">#test2</code>. Or you
                        can add
                        the class <code class=" language-markup">active</code> to the
                        <code class=" language-markup">a</code> tag.
                     </p>
                  </div>
                  <div class="col s12">
                     <div class="row" id="main-view-tab">
                        <div class="col s12">
                           <ul class="tabs tab-demo-active z-depth-1 cyan">
                              <li class="tab col m4">
                                 <a class="white-text waves-effect waves-light" href="#sapien">Sapien</a>
                              </li>
                              <li class="tab col m4">
                                 <a class="white-text waves-effect waves-light active" href="#activeone">Active One</a>
                              </li>
                              <li class="tab col m4">
                                 <a class="white-text waves-effect waves-light" href="#vestibulum">Vestibulum</a>
                              </li>
                           </ul>
                        </div>
                        <div class="col s12">
                           <div id="sapien" class="col s12  cyan lighten-4">
                              <p class="mt-2 mb-2">
                                 Cupcake ipsum dolor sit. Amet gummi bears chupa chups. Tart cotton candy fruitcake
                                 cupcake
                                 croissant sweet biscuit candy candy.
                              </p>
                           </div>
                           <div id="activeone" class="col s12  cyan lighten-4">
                              <p class="mt-2 mb-2">
                                 Icing tart toffee brownie carrot cake. Brownie jelly soufflé. Ice cream bear claw
                                 macaroon
                                 pastry. Bonbon jelly cookie gummies sweet roll muffin pie.
                              </p>
                           </div>
                           <div id="vestibulum" class="col s12  cyan lighten-4">
                              <p class="mt-2 mb-2">
                                 Cupcake ipsum dolor sit amet candy canes cake. Marshmallow brownie gummi bears jelly
                                 beans
                                 sugar plum macaroon donut. Liquorice liquorice lollipop.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div id="html-view-tab">
                     <pre><code class="language-markup col s12">
    &lt;li class="tab col s2">&lt;a class="active" href="#test3">Test 3&lt;/a>&lt;/li>
  </code></pre>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--Swipeable Tabs-->
   <div class="row">
      <div class="col s12 m12 l12">
         <div id="swipeable-tabs" class="card card card-default scrollspy">
            <div class="card-content">
               <h4 class="header">Swipeable Tabs</h4>
               <div class="row">
                  <div class="col s12">
                     <p>
                        By setting the <a>swipeable</a> option to <a>true</a>, you can enable tabs where you can swipe
                        on
                        touch enabled devices to switch tabs. Make sure you keep the tab content divs in the same
                        wrapping
                        container. You can also set the <a>responsiveThreshold</a> option to a screen width in pixels
                        where
                        the swipeable functionality will activate.
                     </p>
                     <br />
                     <p>Note: This is also touch compatible! Try swiping with your finger to scroll through the
                        carousel.</p>
                  </div>
                  <div class="col s12">
                     <ul id="tabs-swipe-demo" class="tabs">
                        <li class="tab col m4"><a href="#test-swipe-1">Test 1</a></li>
                        <li class="tab col m4"><a class="active" href="#test-swipe-2">Test 2</a></li>
                        <li class="tab col m4"><a href="#test-swipe-3">Test 3</a></li>
                     </ul>
                     <div id="test-swipe-1" class="col s12 carousel carousel-item blue white-text">
                        <div class="col s12 mt-1"></div>
                        Test 1
                     </div>
                  </div>
                  <div id="test-swipe-2" class="col s12 carousel carousel-item red white-text">
                     <div class="col s12 mt-1"></div>
                     Test 2
                  </div>
               </div>
               <div id="test-swipe-3" class="col s12 carousel carousel-item green white-text">
                  <div class="col s12 mt-1"></div>
                  Test 3
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection