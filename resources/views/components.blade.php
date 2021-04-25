@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Componentes')

{{-- ÁREA DE CONTEÚDO --}}
@section('content')

<div class="row">

<h2>Alerts</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Default alerts</h4>
            Alerts with contextual background color.
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px" fxLayoutAlign="center start" >

            <div class="alert alert-primary">
              <div class="alert-message">
                <strong>Hello there!</strong> A simple blue alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-danger">
              <div class="alert-message">
                <strong>Hello there!</strong> A simple danger alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-sucess">
              <div class="alert-message">
                <strong>Hello there!</strong> A simple sucess alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-warning">
              <div class="alert-message">
                <strong>Hello there!</strong> A simple warning alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-white">
              <div class="alert-message">
                <strong>Hello there!</strong> A simple white alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

          </div>
        </div>

      </div>

      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Icon alerts</h4>
            Alerts with icon and background color.
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px" fxLayoutAlign="center start">

            <div class="alert alert-primary">
              <div class="alert-icon"><i class="eva eva-camera-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple primary alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-danger">
                <div class="alert-icon"><i class="eva eva-car-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple danger alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-sucess">
              <div class="alert-icon"><i class="eva eva-attach-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple sucess alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-warning">
              <div class="alert-icon"><i class="eva eva-funnel-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple warning alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-white">
              <div class="alert-icon"><i class="eva eva-radio-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple warning alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

          </div>
        </div>

      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Outline alerts</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px" fxLayoutAlign="center start" >

            <div class="alert alert-primary alert-outline">
              <div class="alert-icon"><i class="eva eva-camera-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple primary alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-danger alert-outline">
                <div class="alert-icon"><i class="eva eva-car-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple danger alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-sucess alert-outline">
              <div class="alert-icon"><i class="eva eva-attach-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple sucess alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-warning alert-outline">
              <div class="alert-icon"><i class="eva eva-funnel-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple warning alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

            <div class="alert alert-white alert-outline ">
              <div class="alert-icon"><i class="eva eva-radio-outline"></i></div>
              <div class="alert-message">
                <strong>Hello there!</strong> A simple warning alert—check it out!
              </div>
              <button class="alert-close"><i class="eva eva-close"></i></button>
            </div>

          </div>
        </div>

      </div>

      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Alerts with buttons</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px" fxLayoutAlign="center start">

              <div class="alert alert-primary">
                <div class="alert-message">
                  <h3>Well done!</h3>
                  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                  <hr>
                  <button class="btn btn-white">Okay!!</button>
                </div>
                <button class="alert-close"><i class="eva eva-close"></i></button>
              </div>

              <div class="alert alert-white alert-outline">
                <div class="alert-message">
                  <h3>Well done!</h3>
                  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                  <hr>
                  <button class="btn btn-primary">Okay!!</button>
                </div>
                <button class="alert-close"><i class="eva eva-close"></i></button>
              </div>

          </div>
        </div>

      </div>
    </div>
  </div>


  <br><br><br><br>


  <!-- CARDS -->
  <h2>Cards</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Card Header</h4>
          </div>
          <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Card Header</h4>
            Card Sub-title
          </div>
          <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header card-header-inverse">
            <h4>Card Header Inverse</h4>
          </div>
          <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header card-header-inverse">
            <h4>Card Header Inverse</h4>
            Card Sub-title
          </div>
          <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Card with Button</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start" >
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. </p>
            <button class="btn btn-primary">Primary</button>
          </div>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Card List</h4>
          </div>
          <ul class="card-list">
            <li>Pellentesque non nunc</li>
            <li>Nam eu nibh in velit</li>
            <li>Aenean et justo sollicitudin</li>
            <li>Suspendisse a nunc varius</li>
            <li>Nam eu nibh in velit</li>
          </ul>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <img src="https://picsum.photos/400/200/?random" class="card-image">
          <div class="card-header">
            <h4>Card with Image</h4>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. </p>
          </div>
        </div>

      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="8 0 8">

        <div class="card">
          <ul class="card-tabs">
            <li class="active">Dados Pessoais</li>
            <li>Responsáveis</li>
            <li>Histórico</li>
          </ul>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-body card-body-center">
            <h3>Without Header</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. </p>
            <button class="btn btn-primary">Primary</button>
          </div>
        </div>

      </div>
    </div>
  </div>


  <br><br><br><br>


  <!-- PARAGRAPHS -->
  <h2>Typography</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Paragraph Expanded</h4>
          </div>
          <div class="card-body">
            <p class="expanded">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Paragraph Default</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Paragraph Dondensed</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            <p class="condensed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada euismod justo, nec imperdiet ante consequat imperdiet. Ut porta vel sem vitae vulputate. Maecenas eleifend vulputate orci, eget dignissim metus pulvinar eget. Nunc laoreet, dui pulvinar consequat sodales, metus nunc eleifend risus, eget faucibus elit orci non tortor.</p>
          </div>
        </div>

      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
        <div fxFlex="3 0 3">

          <div class="card">
            <div class="card-header">
              <h4>List unordered</h4>
            </div>
            <div class="card-body">
              
            </div>
          </div>

        </div>
        <div fxFlex="3 0 3">

          <div class="card">
            <div class="card-header">
              <h4>List ordered</h4>
            </div>
            <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
              
            </div>
          </div>

        </div>
        <div fxFlex="3 0 3">

          <div class="card">
            <div class="card-header">
              <h4>Coloured text</h4>
            </div>
            <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
              
            </div>
          </div>

        </div>
        <div fxFlex="3 0 3">

            <div class="card">
              <div class="card-header">
                <h4>Blockquotes</h4>
              </div>
              <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
                
              </div>
            </div>

          </div>
      </div>
  </div>


  <br><br><br><br>


  <!-- HEADINGS -->
  <h2>Headings</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Headings without subtitle</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            <h1>Header - H1</h1>
            <h2>Header - H2</h2>
            <h3>Header - H3</h3>
            <h4>Header - H4</h4>
            <h5>Header - H5</h5>
            <h6>Header - H6</h6>
          </div>
        </div>

      </div>
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Headings with subtitle</h4>
            Nunc congue libero et leo ornare
          </div>
          <div class="card-body">
            <h1>Header - H1 <span>Nunc congue libero et leo ornare</span></h1>
            <h2>Header - H2 <span>Nullam interdum semper tellus</span></h2>
            <h3>Header - H3 <span>Phasellus varius elit lacus</span></h3>
            <h4>Header - H4 <span>Lorem ipsum dolor sit amet</span></h4>
            <h5>Header - H5 <span>Integer in ligula semper</span></h5>
            <h6>Header - H6 <span>Sed ut perspiciatis unde</span></h6>
          </div>
        </div>

      </div>
    </div>
  </div>


  <br><br><br><br>


  <!-- HEADINGS -->
  <h2>Headings</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Buttons - Colors</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            <div fxflex fxLayout="row wrap" fxLayoutAlign="space-around center" style="margin-bottom: 10px;">
              <button class="btn btn-primary">Primary</button>
              <button class="btn btn-danger">Danger</button>
              <button class="btn btn-sucess">Sucess</button>
              <button class="btn btn-warning">Warning</button>
              <button class="btn btn-white">White</button>
            </div>

            <div fxflex fxLayout="row wrap" fxLayoutAlign="space-around center" style="margin-bottom: 10px;">
                <button class="btn btn-primary" disabled>Primary</button>
                <button class="btn btn-danger" disabled>Danger</button>
                <button class="btn btn-sucess" disabled>Sucess</button>
                <button class="btn btn-warning" disabled>Warning</button>
                <button class="btn btn-white" disabled>White</button>
            </div>
          </div>
        </div>

      </div>
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Buttons size</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            <div fxflex fxLayout="row wrap" fxLayoutAlign="space-around center" style="margin-bottom: 10px;">
              <button class="btn btn-primary btn-small">Small</button>
              <button class="btn btn-primary">Medium</button>
              <button class="btn btn-primary btn-large">Large</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <br><br><br><br>



  <!-- BUTTONS -->
  <h2>Buttons</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="12 0 12">

        <div class="card">
          <div class="card-header">
            <h4>Tables</h4>
          </div>
          <div class="card-body">

          </div>
        </div>

      </div>
    </div>
  </div>


  <br><br><br><br>


  <!-- FORMS - ELEMENTS -->
  <h2>Form - Elements</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Input</h4>
          </div>
          <div class="card-body" fxflex fxLayout="row" fxLayoutAlign="center center">
            <input type="text">
          </div>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Text Area</h4>
          </div>
          <div class="card-body" fxflex fxLayout="row" fxLayoutAlign="center center">
            <textarea rows="5"></textarea>
          </div>
        </div>

      </div>
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Select</h4>
          </div>
          <div class="card-body" fxflex fxLayout="row" fxLayoutAlign="center center">
            <select>
              <option value="">Opção 1</option>
              <option value="">Opção 2</option>
              <option value="">Opção 3</option>
              <option value="">Opção 4</option>
            </select>
          </div>
        </div>

      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Radio</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px">

            <label class="label-check">Nunc congue libero et leo ornare
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>

            <label class="label-check">Nullam interdum semper tellus
              <input type="checkbox">
              <span class="checkmark"></span>
            </label>

            <label class="label-check">Phasellus varius elit lacus
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>

            <label class="label-check">Lorem ipsum dolor sit amet
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>

          </div>
        </div>

      </div>

      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Checkbox</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px">

            <label class="label-check">Nunc congue libero et leo ornare
              <input type="radio" name="radio">
              <span class="radiomark"></span>
            </label>

            <label class="label-check">Nullam interdum semper tellus
              <input type="radio" checked="checked" name="radio">
              <span class="radiomark"></span>
            </label>

            <label class="label-check">Phasellus varius elit lacus
              <input type="radio" name="radio">
              <span class="radiomark"></span>
            </label>

            <label class="label-check">Lorem ipsum dolor sit amet
              <input type="radio" name="radio">
              <span class="radiomark"></span>
            </label>

          </div>
        </div>

      </div>

      <div fxFlex="4 0 4">

        <div class="card">
          <div class="card-header">
            <h4>Switches</h4>
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutGap="15px">

              <label class="label-check">Nunc congue libero et leo ornare
                <input type="checkbox" checked="checked">
                <span class="switche"></span>
              </label>

              <label class="label-check">Nullam interdum semper tellus
                  <input type="checkbox">
                <span class="switche"></span>
              </label>

              <label class="label-check">Phasellus varius elit lacus
                <input type="checkbox" checked="checked">
                <span class="switche"></span>
              </label>

              <label class="label-check">Lorem ipsum dolor sit amet
                <input type="checkbox">
                <span class="switche"></span>
              </label>

            </div>
        </div>

      </div>
    </div>
  </div>



  <br><br><br><br>


  <!-- FORMS - ADVANCED ELEMENTS -->
  <h2>Form - Advanced Elements</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Select2</h4>
          </div>
          <div class="card-body" fxflex fxLayout="row" fxLayoutAlign="center center">

          </div>
        </div>

      </div>
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Input Mask</h4>
          </div>
          <div class="card-body" fxflex fxLayout="row" fxLayoutAlign="center center">
            
          </div>
        </div>

      </div>
    </div>
  </div>



  <br><br><br><br>


  <!-- FORMS - LAYOUTS -->
  <h2>Form - Layouts</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">
        
        <div class="card">
          <div class="card-header">
            <h4>Basic form</h4>
            Default Bootstrap form layout
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            
            <form fxflex fxLayout="column" fxLayoutGap="20px" fxFlexFill>
              <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                <label for="input-ver-1" fxFlex="1 0 auto">Email address:</label>
                <input id="input-ver-1" type="email" fxFlex="1 0 auto" placeholder="Email">
                <small class="form-text text-muted">Example block-level help text here.</small>
              </div>

              <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                <label for="input-ver-2" fxFlex="1 0 auto">Password:</label>
                <input id="input-ver-2" type="password" fxFlex="1 0 auto" placeholder="Password">
              </div>

              <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                <label for="input-ver-3" fxFlex="1 0 auto">Textarea:</label>
                <textarea id="input-ver-3" fxFlex="1 0 auto" placeholder="Textarea" rows="4"></textarea>
              </div>

              <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start" fxLayoutGap="5px">
                <label class="label-check">Nunc congue libero et leo ornare
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>

              <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start" fxLayoutGap="5px">
                <label class="label-check">Nunc congue libero et leo ornare
                  <input type="radio" name="radio">
                  <span class="radiomark"></span>
                </label>

                <label class="label-check">Nullam interdum semper tellus
                  <input type="radio" checked="checked" name="radio">
                  <span class="radiomark"></span>
                </label>

                <label class="label-check">Phasellus varius elit lacus
                  <input type="radio" name="radio">
                  <span class="radiomark"></span>
                </label>
              </div>

              <div class="form-group" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <button type="submit" class="btn btn-white">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </form>
          </div>
        </div>

      </div>

      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Horizontal form</h4>
            Horizontal Bootstrap layout
          </div>
          <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
            
            <form fxflex fxLayout="column" fxLayoutGap="20px" fxFlexFill>
              <div class="form-group form-group-row" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <label for="input-hor-1" fxFlex="0 0 auto">Email:</label>
                <input id="input-hor-1" type="email" fxFlex="0 1 auto" placeholder="Email">
              </div>

              <div class="form-group form-group-row" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <label for="input-hor-2" fxFlex="0 0 auto">Password:</label>
                <input id="input-hor-2" type="password" fxFlex="0 1 auto" placeholder="Password">
                <small>Example block-level help text here.</small>
              </div>

              <div class="form-group form-group-row" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <label for="input-hor-3" fxFlex="0 0 auto">Textarea:</label>
                <textarea id="input-hor-3" placeholder="Textarea" fxFlex="0 1 auto" rows="4"></textarea>
              </div>

              <div class="form-group form-group-row" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <label fxFlex="0 0 auto">Radios:</label>
                <div fxflex fxLayout="column" fxLayoutGap="5px">
                  <label class="label-check">Nunc congue libero et leo ornare
                      <input type="radio" name="radio">
                      <span class="radiomark"></span>
                  </label>
                  
                  <label class="label-check">Nullam interdum semper tellus
                      <input type="radio" checked="checked" name="radio">
                      <span class="radiomark"></span>
                  </label>
                  
                  <label class="label-check">Phasellus varius elit lacus
                      <input type="radio" checked="checked" name="radio">
                      <span class="radiomark"></span>
                  </label>
                </div>
              </div>

              <div class="form-group form-group-row" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <label fxFlex="0 0 auto">Checkbox:</label>
                <div fxflex fxLayout="column" fxLayoutGap="5px">
                  <label class="label-check">Nunc congue libero et leo ornare
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              
              <div class="form-group" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="10px">
                <button type="submit" class="btn btn-white">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </form>
          </div>
        </div>
        
      </div>
    </div>

    <div fxLayout="row" fxLayoutGap="15px">
        <div fxFlex="4 0 4">
          
          <div class="card">
            <div class="card-header">
              <h4>Float Labels</h4>
            </div>
            <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
              
              <form fxflex fxLayout="column" fxLayoutGap="20px" fxFlexFill>
                <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                  <div class="floating-label">
                    <input fxFlex="1 0 auto" type="text" id="input1" placeholder="Nunc congue libero et leo ornare">
                    <label for="input1">Nunc congue libero et leo ornare</label>
                  </div>
                </div>

                <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                  <div class="floating-label">
                    <input fxFlex="1 0 auto" type="text" id="input2" placeholder="Phasellus varius elit lacus">
                    <label for="input2">Phasellus varius elit lacus</label>
                  </div>
                </div>

                <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                  <div class="floating-label">
                    <input fxFlex="1 0 auto" type="text" id="input3" placeholder="Nullam interdum semper tellus">
                    <label for="input3">Nullam interdum semper tellus</label>
                  </div>
                </div>

              </form>
            </div>
          </div>

        </div>

        <div fxFlex="8 0 8">

          <div class="card">
            <div class="card-header">
              <h4>Complex Forms</h4>
            </div>
            <div class="card-body" fxflex fxLayout="column" fxLayoutAlign="center start">
              <form fxflex fxLayout="column" fxLayoutGap="15px" fxFlexFill>

                <div fxLayout="row" fxLayoutGap="15px">
                  <div fxFlex="3 0 3">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-float-1" fxFlex="1 0 auto">3 Columns:</label>
                      <input type="email" id="input-float-1" fxFlex="1 0 auto" placeholder="3 Columns">
                    </div>

                  </div>
                  <div fxFlex="7 0 7">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-float-2" fxFlex="1 0 auto">7 Columns:</label>
                      <input type="email" id="input-float-2" fxFlex="1 0 auto" placeholder="7 Columns">
                    </div>

                  </div>
                  <div fxFlex="2 0 2">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-float-3" fxFlex="1 0 auto">2 Column:</label>
                      <input type="email" id="input-float-3" fxFlex="1 0 auto" placeholder="2 Column">
                    </div>

                  </div>
                </div>
                <div fxLayout="row" fxLayoutGap="15px">
                  <div fxFlex="4 0 4">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-4" fxFlex="1 0 auto">4 Columns:</label>
                      <input type="email" id="input-4" fxFlex="1 0 auto" placeholder="4 Columns">
                    </div>

                  </div>
                  <div fxFlex="5 0 5">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-5" fxFlex="1 0 auto">5 Columns:</label>
                      <input type="email" id="input-5" fxFlex="1 0 auto" placeholder="5 Columns">
                    </div>

                  </div>
                  <div fxFlex="3 0 3">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-6" fxFlex="1 0 auto">3 Columns:</label>
                      <input type="email" id="input-6" fxFlex="1 0 auto" placeholder="3 Columns">
                    </div>

                  </div>
                </div>
                <div fxLayout="row" fxLayoutGap="15px">
                  <div fxFlex="2 0 2">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-7" fxFlex="1 0 auto">2 Columns:</label>
                      <input type="email" id="input-7" fxFlex="1 0 auto" placeholder="2 Columns">
                    </div>

                  </div>
                  <div fxFlex="4 0 4">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-8" fxFlex="1 0 auto">4 Columns:</label>
                      <input type="email" id="input-8" fxFlex="1 0 auto" placeholder="4 Columns">
                    </div>

                  </div>
                  <div fxFlex="6 0 6">

                    <div class="form-group" fxflex fxLayout="column" fxLayoutAlign="center start">
                      <label for="input-9" fxFlex="1 0 auto">6 Columns:</label>
                      <input type="email" id="input-9" fxFlex="1 0 auto" placeholder="6 Columns">
                    </div>

                  </div>
                </div>

                <div class="form-group" fxflex fxLayout="row" fxLayoutAlign="start center" fxLayoutGap="15px">
                  <button type="submit" class="btn btn-white">Clear</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>
          </div>
          
        </div>
    </div>
  </div>


  <br><br><br><br>


  <!-- OTHERS -->
  <h2>Others</h2>
  <div fxLayout="column" fxLayoutGap="15px">
    <div fxLayout="row" fxLayoutGap="15px">
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Spinners</h4>
            Indicate the loading state of a component with Bootstrap spinners.
          </div>
          <div class="card-body">

            <div fxflex fxLayout="row" fxLayoutAlign="space-around center" style="margin-bottom: 10px;">
                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                <div class="lds-ellipsis lds-ellipsis-horizontal"><div></div><div></div><div></div><div></div></div>
                <div class="lds-ripple"><div></div><div></div></div>
            </div>

          </div>
        </div>

      </div>
      <div fxFlex="6 0 6">

        <div class="card">
          <div class="card-header">
            <h4>Image - Avatar</h4>

          </div>
          <div class="card-body">

          </div>
        </div>

      </div>
    </div>

</div>

@endsection