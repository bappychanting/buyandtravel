@extends('layouts.master')

@section('title', $user->name." || View Order Details || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        User Content
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>User Content</li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('orders.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Order Details</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10">
                <h2>View Order Details</h2>
                <h5 class="my-3 font-weight-bold">{{ $order->product_name }}</h5>
                <h6><i class="fa fa-tags fa-sm pr-2"></i><span class="dark-grey-text">{{ $order->product_type->product_type }}</span></h6>
                <hr class="mb-4">
                <p class="mt-4">
                  <i class="fa fa-clock-o fa-sm pr-2"></i><span class="font-weight-bold light-blue-text">{{$order->created_at->format('l d F Y, h:i A')}}</span>
                </p>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method'=>'delete']) !!}
                    <a href="{{ $order->reference_link }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Reference Link</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-edit fa-sm pr-2" aria-hidden="true"></i>Update Order</a>
                    {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete', array('class' => 'btn btn-blue btn-sm form_delete_sweet_alert', 'type'=>'submit')) !!}
                {!! Form::close() !!}

                  <!-- Portfolio Section -->
                    <div class="item my-4" id="aniimated-thumbnials">
                      <ul id="content-slider" class="content-slider">
                        @foreach($order->images as $image)
                          <li>
                              <a href="{{ asset($image->src) }}" data-sub-html="{{ $order->product_name.' '.$loop->iteration }}"> 
                                <img class="img-fluid" src="{{ asset($image->src) }}" alt="{{ $image->alt.' '.$loop->iteration }}">
                              </a>
                              {!! Form::open(['route' => ['order.image.delete', $image->id], 'method'=>'delete']) !!}
                                {!! Form::button('<i class="fa fa-trash"" aria-hidden="true"></i>', array('class' => 'btn btn-blue btn-sm form_delete_sweet_alert', 'type'=>'submit')) !!}
                              {!! Form::close() !!}
                          </li>
                        @endforeach  
                      </ul>
                      @if(count($order->images) < 5)
                        <button type="button" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#updateimage">
                          <i class="fa fa-cloud-upload fa-sm pr-2"" aria-hidden="true"></i>Add image
                        </button>
                      @endif
                    </div>
                  <!-- #End# Portfolio Section -->

                <button class="btn btn-primary btn-md mb-4" id="showDetailsButton" type="button" data-toggle="collapse" data-target="#showDetails" aria-expanded="false" aria-controls="showDetails">
                  <i class="fa fa-folder-open fa-sm pr-2"></i>Click Here to Show Details
                </button>
                <div class="collapse" id="showDetails">
                  {!! $order->additional_details !!}
                </div>

                <h5 class="my-4"><i class="fa fa-money fa-sm pr-2"></i>{{ $order->expected_price }}/=</h5>
                <h6 class="my-4"><i class="fa fa-map-signs fa-sm pr-2"></i>{{ $order->delivery_location }}</h6>
                <p class="my-4">
                  @if( !empty($order->tags) )
                    @php $tags = explode(',', $order->tags); @endphp
                    @foreach($tags as $tag) <div class="chip blue lighten-1 white-text">{{ $tag }}</div> @endforeach
                  @endif
                </p>
                <p class="grey-text">Views: {{ $order->views }}</p>
                <h4>Offers</h4><hr>
                <div class="table-responsive">
                <div class="md-form">
                    <input type="email" class="form-control">
                    <label for="materialFormRegisterEmailEx">Search Offers</label>
                </div>
                <div class="text-center mt-4  mb-4">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </div>

                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Position
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Office
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Age
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Start date
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Salary
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
    <tr>
      <td>Garrett Winters</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>63</td>
      <td>2011/07/25</td>
      <td>$170,750</td>
    </tr>
    <tr>
      <td>Ashton Cox</td>
      <td>Junior Technical Author</td>
      <td>San Francisco</td>
      <td>66</td>
      <td>2009/01/12</td>
      <td>$86,000</td>
    </tr>
    <tr>
      <td>Cedric Kelly</td>
      <td>Senior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2012/03/29</td>
      <td>$433,060</td>
    </tr>
    <tr>
      <td>Airi Satou</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>33</td>
      <td>2008/11/28</td>
      <td>$162,700</td>
    </tr>
    <tr>
      <td>Brielle Williamson</td>
      <td>Integration Specialist</td>
      <td>New York</td>
      <td>61</td>
      <td>2012/12/02</td>
      <td>$372,000</td>
    </tr>
    <tr>
      <td>Herrod Chandler</td>
      <td>Sales Assistant</td>
      <td>San Francisco</td>
      <td>59</td>
      <td>2012/08/06</td>
      <td>$137,500</td>
    </tr>
    <tr>
      <td>Rhona Davidson</td>
      <td>Integration Specialist</td>
      <td>Tokyo</td>
      <td>55</td>
      <td>2010/10/14</td>
      <td>$327,900</td>
    </tr>
    <tr>
      <td>Colleen Hurst</td>
      <td>Javascript Developer</td>
      <td>San Francisco</td>
      <td>39</td>
      <td>2009/09/15</td>
      <td>$205,500</td>
    </tr>
    <tr>
      <td>Sonya Frost</td>
      <td>Software Engineer</td>
      <td>Edinburgh</td>
      <td>23</td>
      <td>2008/12/13</td>
      <td>$103,600</td>
    </tr>
    <tr>
      <td>Jena Gaines</td>
      <td>Office Manager</td>
      <td>London</td>
      <td>30</td>
      <td>2008/12/19</td>
      <td>$90,560</td>
    </tr>
    <tr>
      <td>Quinn Flynn</td>
      <td>Support Lead</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2013/03/03</td>
      <td>$342,000</td>
    </tr>
    <tr>
      <td>Charde Marshall</td>
      <td>Regional Director</td>
      <td>San Francisco</td>
      <td>36</td>
      <td>2008/10/16</td>
      <td>$470,600</td>
    </tr>
    <tr>
      <td>Haley Kennedy</td>
      <td>Senior Marketing Designer</td>
      <td>London</td>
      <td>43</td>
      <td>2012/12/18</td>
      <td>$313,500</td>
    </tr>
    <tr>
      <td>Tatyana Fitzpatrick</td>
      <td>Regional Director</td>
      <td>London</td>
      <td>19</td>
      <td>2010/03/17</td>
      <td>$385,750</td>
    </tr>
    <tr>
      <td>Michael Silva</td>
      <td>Marketing Designer</td>
      <td>London</td>
      <td>66</td>
      <td>2012/11/27</td>
      <td>$198,500</td>
    </tr>
    <tr>
      <td>Paul Byrd</td>
      <td>Chief Financial Officer (CFO)</td>
      <td>New York</td>
      <td>64</td>
      <td>2010/06/09</td>
      <td>$725,000</td>
    </tr>
    <tr>
      <td>Gloria Little</td>
      <td>Systems Administrator</td>
      <td>New York</td>
      <td>59</td>
      <td>2009/04/10</td>
      <td>$237,500</td>
    </tr>
    <tr>
      <td>Bradley Greer</td>
      <td>Software Engineer</td>
      <td>London</td>
      <td>41</td>
      <td>2012/10/13</td>
      <td>$132,000</td>
    </tr>
    <tr>
      <td>Dai Rios</td>
      <td>Personnel Lead</td>
      <td>Edinburgh</td>
      <td>35</td>
      <td>2012/09/26</td>
      <td>$217,500</td>
    </tr>
    <tr>
      <td>Jenette Caldwell</td>
      <td>Development Lead</td>
      <td>New York</td>
      <td>30</td>
      <td>2011/09/03</td>
      <td>$345,000</td>
    </tr>
    <tr>
      <td>Yuri Berry</td>
      <td>Chief Marketing Officer (CMO)</td>
      <td>New York</td>
      <td>40</td>
      <td>2009/06/25</td>
      <td>$675,000</td>
    </tr>
    <tr>
      <td>Caesar Vance</td>
      <td>Pre-Sales Support</td>
      <td>New York</td>
      <td>21</td>
      <td>2011/12/12</td>
      <td>$106,450</td>
    </tr>
    <tr>
      <td>Doris Wilder</td>
      <td>Sales Assistant</td>
      <td>Sidney</td>
      <td>23</td>
      <td>2010/09/20</td>
      <td>$85,600</td>
    </tr>
    <tr>
      <td>Angelica Ramos</td>
      <td>Chief Executive Officer (CEO)</td>
      <td>London</td>
      <td>47</td>
      <td>2009/10/09</td>
      <td>$1,200,000</td>
    </tr>
    <tr>
      <td>Gavin Joyce</td>
      <td>Developer</td>
      <td>Edinburgh</td>
      <td>42</td>
      <td>2010/12/22</td>
      <td>$92,575</td>
    </tr>
    <tr>
      <td>Jennifer Chang</td>
      <td>Regional Director</td>
      <td>Singapore</td>
      <td>28</td>
      <td>2010/11/14</td>
      <td>$357,650</td>
    </tr>
    <tr>
      <td>Brenden Wagner</td>
      <td>Software Engineer</td>
      <td>San Francisco</td>
      <td>28</td>
      <td>2011/06/07</td>
      <td>$206,850</td>
    </tr>
    <tr>
      <td>Fiona Green</td>
      <td>Chief Operating Officer (COO)</td>
      <td>San Francisco</td>
      <td>48</td>
      <td>2010/03/11</td>
      <td>$850,000</td>
    </tr>
    <tr>
      <td>Shou Itou</td>
      <td>Regional Marketing</td>
      <td>Tokyo</td>
      <td>20</td>
      <td>2011/08/14</td>
      <td>$163,000</td>
    </tr>
    <tr>
      <td>Michelle House</td>
      <td>Integration Specialist</td>
      <td>Sidney</td>
      <td>37</td>
      <td>2011/06/02</td>
      <td>$95,400</td>
    </tr>
    <tr>
      <td>Suki Burks</td>
      <td>Developer</td>
      <td>London</td>
      <td>53</td>
      <td>2009/10/22</td>
      <td>$114,500</td>
    </tr>
    <tr>
      <td>Prescott Bartlett</td>
      <td>Technical Author</td>
      <td>London</td>
      <td>27</td>
      <td>2011/05/07</td>
      <td>$145,000</td>
    </tr>
    <tr>
      <td>Gavin Cortez</td>
      <td>Team Leader</td>
      <td>San Francisco</td>
      <td>22</td>
      <td>2008/10/26</td>
      <td>$235,500</td>
    </tr>
    <tr>
      <td>Martena Mccray</td>
      <td>Post-Sales support</td>
      <td>Edinburgh</td>
      <td>46</td>
      <td>2011/03/09</td>
      <td>$324,050</td>
    </tr>
    <tr>
      <td>Unity Butler</td>
      <td>Marketing Designer</td>
      <td>San Francisco</td>
      <td>47</td>
      <td>2009/12/09</td>
      <td>$85,675</td>
    </tr>
    <tr>
      <td>Howard Hatfield</td>
      <td>Office Manager</td>
      <td>San Francisco</td>
      <td>51</td>
      <td>2008/12/16</td>
      <td>$164,500</td>
    </tr>
    <tr>
      <td>Hope Fuentes</td>
      <td>Secretary</td>
      <td>San Francisco</td>
      <td>41</td>
      <td>2010/02/12</td>
      <td>$109,850</td>
    </tr>
    <tr>
      <td>Vivian Harrell</td>
      <td>Financial Controller</td>
      <td>San Francisco</td>
      <td>62</td>
      <td>2009/02/14</td>
      <td>$452,500</td>
    </tr>
    <tr>
      <td>Timothy Mooney</td>
      <td>Office Manager</td>
      <td>London</td>
      <td>37</td>
      <td>2008/12/11</td>
      <td>$136,200</td>
    </tr>
    <tr>
      <td>Jackson Bradshaw</td>
      <td>Director</td>
      <td>New York</td>
      <td>65</td>
      <td>2008/09/26</td>
      <td>$645,750</td>
    </tr>
    <tr>
      <td>Olivia Liang</td>
      <td>Support Engineer</td>
      <td>Singapore</td>
      <td>64</td>
      <td>2011/02/03</td>
      <td>$234,500</td>
    </tr>
    <tr>
      <td>Bruno Nash</td>
      <td>Software Engineer</td>
      <td>London</td>
      <td>38</td>
      <td>2011/05/03</td>
      <td>$163,500</td>
    </tr>
    <tr>
      <td>Sakura Yamamoto</td>
      <td>Support Engineer</td>
      <td>Tokyo</td>
      <td>37</td>
      <td>2009/08/19</td>
      <td>$139,575</td>
    </tr>
    <tr>
      <td>Thor Walton</td>
      <td>Developer</td>
      <td>New York</td>
      <td>61</td>
      <td>2013/08/11</td>
      <td>$98,540</td>
    </tr>
    <tr>
      <td>Finn Camacho</td>
      <td>Support Engineer</td>
      <td>San Francisco</td>
      <td>47</td>
      <td>2009/07/07</td>
      <td>$87,500</td>
    </tr>
    <tr>
      <td>Serge Baldwin</td>
      <td>Data Coordinator</td>
      <td>Singapore</td>
      <td>64</td>
      <td>2012/04/09</td>
      <td>$138,575</td>
    </tr>
    <tr>
      <td>Zenaida Frank</td>
      <td>Software Engineer</td>
      <td>New York</td>
      <td>63</td>
      <td>2010/01/04</td>
      <td>$125,250</td>
    </tr>
    <tr>
      <td>Zorita Serrano</td>
      <td>Software Engineer</td>
      <td>San Francisco</td>
      <td>56</td>
      <td>2012/06/01</td>
      <td>$115,000</td>
    </tr>
    <tr>
      <td>Jennifer Acosta</td>
      <td>Junior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>43</td>
      <td>2013/02/01</td>
      <td>$75,650</td>
    </tr>
    <tr>
      <td>Cara Stevens</td>
      <td>Sales Assistant</td>
      <td>New York</td>
      <td>46</td>
      <td>2011/12/06</td>
      <td>$145,600</td>
    </tr>
    <tr>
      <td>Hermione Butler</td>
      <td>Regional Director</td>
      <td>London</td>
      <td>47</td>
      <td>2011/03/21</td>
      <td>$356,250</td>
    </tr>
    <tr>
      <td>Lael Greer</td>
      <td>Systems Administrator</td>
      <td>London</td>
      <td>21</td>
      <td>2009/02/27</td>
      <td>$103,500</td>
    </tr>
    <tr>
      <td>Jonas Alexander</td>
      <td>Developer</td>
      <td>San Francisco</td>
      <td>30</td>
      <td>2010/07/14</td>
      <td>$86,500</td>
    </tr>
    <tr>
      <td>Shad Decker</td>
      <td>Regional Director</td>
      <td>Edinburgh</td>
      <td>51</td>
      <td>2008/11/13</td>
      <td>$183,000</td>
    </tr>
    <tr>
      <td>Michael Bruce</td>
      <td>Javascript Developer</td>
      <td>Singapore</td>
      <td>29</td>
      <td>2011/06/27</td>
      <td>$183,000</td>
    </tr>
    <tr>
      <td>Donna Snider</td>
      <td>Customer Support</td>
      <td>New York</td>
      <td>27</td>
      <td>2011/01/25</td>
      <td>$112,000</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>Name</i>
      </th>
      <th>Position</i>
      </th>
      <th>Office</i>
      </th>
      <th>Age</i>
      </th>
      <th>Start date</i>
      </th>
      <th>Salary</i>
      </th>
    </tr>
  </tfoot>
</table>


                <table class="table table-fixed" id="dataTable" >
                    <thead>
                        <tr>
                          <th>#</th>
                          <th><i class="fa fa-shopping-bag fa-sm pr-2"></i>Added By</th>
                          <th><i class="fa fa-cart-plus fa-sm pr-2"></i>Quantity</th>
                          <th><i class="fa fa-dollar fa-sm pr-2"></i>Asking Price</th>
                          <th><i class="fa fa-calendar-check-o fa-sm pr-2"></i>Delivery Date</th>
                          <th><i class="fa fa-gears fa-sm pr-2"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->offers as $offer)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $offer->user->name }}</td>
                          <td>{{ $offer->product_quantity }}</td>
                          <td>{{ $offer->asking_price }}/=</td>
                          <td>{{ date('l d F Y', strtotime($offer->delivery_date)) }}</td>
                          <td>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{ route('offers.show', $offer->id) }}"><i class="fa fa-eye fa-sm pr-2" aria-hidden="true"></i>View Offer</a>
                                    <a class="dropdown-item" href="{{ route('front.orders.show', $offer->order->id) }}"><i class="fa fa-external-link fa-sm pr-2" aria-hidden="true"></i>Open Order</a>
                                    {!! Form::open(['route' => ['offers.destroy', $offer->id], 'method'=>'delete']) !!}
                                    {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete', array('class' => 'dropdown-item form_delete_sweet_alert', 'type'=>'submit')) !!}
                                    {!! Form::close() !!}
                                  </div>
                              </div>
                          </td>
                        </tr>
                        @endforeach   
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th><i class="fa fa-shopping-bag fa-sm pr-2"></i>Added By</th>
                        <th><i class="fa fa-cart-plus fa-sm pr-2"></i>Quantity</th>
                        <th><i class="fa fa-dollar fa-sm pr-2"></i>Asking Price</th>
                        <th><i class="fa fa-calendar-check-o fa-sm pr-2"></i>Delivery Date</th>
                        <th><i class="fa fa-gears fa-sm pr-2"></i>Actions</th>
                      </tr>
                    </tfoot>
                </table>
            </div>
            <!-- #END# Content Column -->
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- Modal -->
    <div class="modal fade" id="updateimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Order Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body image_modal">
                  <div class="text-center">
                    <img src="http://placehold.it/200" class="img-fluid z-depth-1 preview_input" alt="Responsive image">
                    <p class="text-center mt-4">Maximum Allowed Size: 500 KB</p>
                  </div>
                    {!! Form::open(['class'=>'md-form upload_image', 'method' => 'post', 'route' => ['order.image.add'], 'enctype' => 'multipart/form-data']) !!}
                      {!! Form::hidden('id', $order->id) !!}
                      <div class="file-field">
                          <div class="btn btn-primary btn-sm float-left">
                              <span>Select</span>
                              {!! Form::file("image", ['class'=>'input_image']) !!}
                          </div>
                          <div class="file-path-wrapper">
                              {!! Form::text('', null, ['class'=>'file-path validate', 'placeholder'=>'Choose your file']) !!}
                          </div>
                      </div>
                      <div class="text-center mt-4">
                          {{ Form::button('Upload Image <i class="fa fa-upload ml-1"></i>', ['type' => 'submit', 'class' => 'btn btn-cyan mt-1 btn-md'] ) }}
                      </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

