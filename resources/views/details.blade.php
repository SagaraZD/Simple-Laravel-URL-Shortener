@include('header')
    <body>
        <div class="container">
            <div class="content">
            <!-- Short Link Details section -->
            <section>
                <h1>Short Link Details</h1>
                <br/> <br/>
                <h3> Countries </h3>
                <table class="table table-bordered">
				    <thead>
				      <tr>
				        <th> Name</th>
				        <th> Date / time </th>
				      </tr>
				    </thead>
				    <tbody>
				    @foreach($locations as $location)
				      <tr>
				        <td><?php echo $location->location->name; ?></td>
				        <td> {{$location->created_at}} </td>
				      </tr>
				      @endforeach
				    </tbody>
				  </table>
 			</section>
				<br/>

		<!-- Other Info section -->
			<section> 
                <h3> Other Information </h3><br/>
				  <table class="table table-bordered">
				    <thead>
				      <tr>
				        <th> Item</th>
				        <th>Details</th>
				      </tr>
				    </thead>
				    <tbody>
				    @foreach($hits as $hit)
				      <tr>
				        <td>Total Hits </td>
				        <td>{{$hit->hit_count}} </td>
				      </tr>
				      <tr>
				        <td>Last Visit </td>
				        <td>{{$hit->updated_at}} </td>
				      </tr
				      @endforeach
				    </tbody>
				  </table>
				  <a href="{{ url()->previous() }}"> Go back </a>
			</section>


            </div>
        </div>
    </body>
</html>
