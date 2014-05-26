	<div class="container">
        <div class="span8">
			<h2>Contacts</h2>

			<div>
				<a class="btn" href="/consultant/clients/add/?grouping=Contacts"><i class="icon-plus-sign"></i> Add Contact</a>
				<a class="btn" href="/consultant/clients/add/?grouping=Clients"><i class="icon-plus-sign"></i> Add Client</a>
				<a class="btn" href="/consultant/clients/add/?grouping=Consultants"><i class="icon-plus-sign"></i> Add Consultant</a>
				<a class="btn" href="/consultant/import/contacts">Import</a>
				<a class="btn" href="/consultant/clients/export">Export</a>
			</div>

			<ul class="nav nav-tabs" style="padding-top:20px">
				<li <?php if($tabs['group'] == 'All') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=All&content=<?php echo $tabs['content']; ?>">All</a>
				</li>
				<li <?php if($tabs['group'] == 'Clients') echo "class=\"active\""; ?>><a href="/consultant/clients/?group=Clients&content=<?php echo $tabs['content']; ?>">Clients</a>
				<li <?php if($tabs['group'] == 'Consultants') echo "class=\"active\""; ?>><a href="/consultant/clients/?group=Consultants&content=<?php echo $tabs['content']; ?>">Consultants</a>
			</ul>
	
			<ul class="nav nav-pills">
				<li <?php if($tabs['content'] == 'All') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=All" style="padding: 5px 9px;">All</a>
				</li>
				<li <?php if($tabs['content'] == '123') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=123" style="padding: 5px 9px;">123</a>
				</li>
				<li <?php if($tabs['content'] == 'A') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=A" style="padding: 5px 9px;">A</a>
				</li>
				<li <?php if($tabs['content'] == 'B') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=B" style="padding: 5px 9px;">B</a>
				</li>
				<li <?php if($tabs['content'] == 'C') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=C" style="padding: 5px 9px;">C</a>
				</li>
				<li <?php if($tabs['content'] == 'D') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=D" style="padding: 5px 9px;">D</a>
				</li>
				<li <?php if($tabs['content'] == 'E') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=E" style="padding: 5px 9px;">E</a>
				</li>
				<li <?php if($tabs['content'] == 'F') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=F" style="padding: 5px 9px;">F</a>
				</li>
				<li <?php if($tabs['content'] == 'G') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=G" style="padding: 5px 9px;">G</a>
				</li>
				<li <?php if($tabs['content'] == 'H') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=H" style="padding: 5px 9px;">H</a>
				</li>
				<li <?php if($tabs['content'] == 'I') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=I" style="padding: 5px 9px;">I</a>
				</li>
				<li <?php if($tabs['content'] == 'J') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=J" style="padding: 5px 9px;">J</a>
				</li>
				<li <?php if($tabs['content'] == 'K') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=K" style="padding: 5px 9px;">K</a>
				</li>
				<li <?php if($tabs['content'] == 'L') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=L" style="padding: 5px 9px;">L</a>
				</li>
				<li <?php if($tabs['content'] == 'M') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=M" style="padding: 5px 9px;">M</a>
				</li>
				<li <?php if($tabs['content'] == 'N') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=N" style="padding: 5px 9px;">N</a>
				</li>
				<li <?php if($tabs['content'] == 'O') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=O" style="padding: 5px 9px;">O</a>
				</li>
				<li <?php if($tabs['content'] == 'P') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=P" style="padding: 5px 9px;">P</a>
				</li>
				<li <?php if($tabs['content'] == 'Q') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=Q" style="padding: 5px 9px;">Q</a>
				</li>
				<li <?php if($tabs['content'] == 'R') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=R" style="padding: 5px 9px;">R</a>
				</li>
				<li <?php if($tabs['content'] == 'S') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=S" style="padding: 5px 9px;">S</a>
				</li>
				<li <?php if($tabs['content'] == 'T') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=T" style="padding: 5px 9px;">T</a>
				</li>
				<li <?php if($tabs['content'] == 'U') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=U" style="padding: 5px 9px;">U</a>
				</li>
				<li <?php if($tabs['content'] == 'V') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=V" style="padding: 5px 9px;">V</a>
				</li>
				<li <?php if($tabs['content'] == 'W') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=W" style="padding: 5px 9px;">W</a>
				</li>
				<li <?php if($tabs['content'] == 'X') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=X" style="padding: 5px 9px;">X</a>
				</li>
				<li <?php if($tabs['content'] == 'Y') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=Y" style="padding: 5px 9px;">Y</a>
				</li>
				<li <?php if($tabs['content'] == 'Z') echo "class=\"active\""; ?>>
					<a href="/consultant/clients/?group=<?php echo $tabs['group']; ?>&content=Z" style="padding: 5px 9px;">Z</a>
				</li>
			</ul>

			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email Address</th>
						<th>Phone Number</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $row): ?>					
						<tr>
							<td><a href="/consultant/clients/view/<?php echo $row->client_id;?>"><?php echo $row->firstname; ?>&nbsp;<?php echo $row->surname; ?></a></td>
							<td><?php echo $row->email1; ?></td>
							<td><?php echo $row->telephone1; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links(); ?>
		</div><!--span8-->
	</div><!--container-->
				
