<!-- ############################# GRADE 7 ################################-->
<div class="collapsible-header green"><b class="white-text"><h4>Grade 7</h4></b></div>
<div class="collapsible-body">
	<button class="btn blue tbl1" type="button">export</button>
	<div class="row">
		<div class=" col s1 card light-blue darken-4" style="width:15%; height: 100px;">
			<div class="white-text" style="padding-left:15px;">
				<ul>
					<li><h4><?php echo $total_count_of_male_GRD7; ?></h4></li>
					<li><p>Male</p></li>
				</ul>
			</div>
		</div>
		<div class=" col s1 card red darken-1" style="width:15%; height:100px; margin-left:2%;">
			<div class="white-text" style="padding-left:15px;">
				<ul>
					<li><h4><?php echo $total_count_of_female_GRD7; ?></h4></li>
					<li><p>Female</p></li>
				</ul>
			</div>
		</div>
		<div class=" col s1 push-s1 card green darken-1" style="width:15%; height: 100px; margin-left:2%;">
			<div class=" white-text" style="padding-left:15px;">
				<ul>
					<li>
						<h4>
						<?php echo $total_count_of_minor_GRD7 ?>
						</h4>
					</li>
					<li>
						<p>Minor</p>
					</li>
				</ul>
			</div>
		</div>
		<div class=" col s1 push-s1 card yellow darken-3" style="width:15%; height: 100px; margin-left:2%;">
			<div class=" white-text" style="padding-left:15px;">
				<ul>
					<li>
						<h4>
						<?php echo $total_count_of_major_GRD7?>
						</h4>
						<li>
							<p>Major</p>
						</li>
					</ul>
				</div>
			</div>
			<div class=" col s1 push-s1 card blue darken-1" style="width:15%; height: 100px; margin-left:2%;">
				<div class=" white-text" style="padding-left:15px;">
					<ul>
						<li>
							<h4 >
							<?php echo $total_violation_GRD7;?>
							</h4>
						</li>
						<li>
							<p >Total Violation</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<br>
		<br>
		<table class="striped table2excel" data-tableName="Test Table 1">
			<thead>
				<tr>
					<th>Section</th>
					<th>Male</th>
					<th>Female</th>
					<th>Minor</th>
					<th>Major</th>
					<th>Total Violation</th>
					<th class="noExl">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Antipolo</td>
					<td><?php echo $total_count_of_male_GRD7_ANTIPOLO;?></td>
					<td><?php echo $total_count_of_female_GRD7_ANTIPOLO;?></td>
					<td><?php echo $total_count_of_minor_GRD7_ANTIPOLO;?></td>
					<td><?php echo $total_count_of_major_GRD7_ANTIPOLO;?></td>
					<td><?php echo $total_violation_GRD7_ANTIPOLO;?></td>
					<td class="noExl">
						<a href="../month/generate_report/grd7/antipolo_rpt.php">
							<i class="meduim material-icons">visibility</i>
						</a>
						<button class="antipolo">generate</button>
					</td>
				</tr>
				<tr>
					<td>Bacolod</td>
					<td><?php echo $total_count_of_male_GRD7_BACOLOD;?></td>
					<td><?php echo $total_count_of_female_GRD7_BACOLOD;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BACOLOD;?></td>
					<td><?php echo $total_count_of_major_GRD7_BACOLOD;?></td>
					<td><?php echo $total_violation_GRD7_BACOLOD;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Baguio</td>
					<td><?php echo $total_count_of_male_GRD7_BAGUIO;?></td>
					<td><?php echo $total_count_of_female_GRD7_BAGUIO;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BAGUIO;?></td>
					<td><?php echo $total_count_of_major_GRD7_BAGUIO;?></td>
					<td><?php echo $total_violation_GRD7_BAGUIO;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Baler</td>
					<td><?php echo $total_count_of_male_GRD7_BALER;?></td>
					<td><?php echo $total_count_of_female_GRD7_BALER;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BALER;?></td>
					<td><?php echo $total_count_of_major_GRD7_BALER;?></td>
					<td><?php echo $total_violation_GRD7_BALER;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Banaue</td>
					<td><?php echo $total_count_of_male_GRD7_BANAUE;?></td>
					<td><?php echo $total_count_of_female_GRD7_BANAUE;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BANAUE;?></td>
					<td><?php echo $total_count_of_major_GRD7_BANAUE;?></td>
					<td><?php echo $total_violation_GRD7_BANAUE;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Batanes</td>
					<td><?php echo $total_count_of_male_GRD7_BATANES;?></td>
					<td><?php echo $total_count_of_female_GRD7_BATANES;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BATANES;?></td>
					<td><?php echo $total_count_of_major_GRD7_BATANES;?></td>
					<td><?php echo $total_violation_GRD7_BATANES;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Bohol</td>
					<td><?php echo $total_count_of_male_GRD7_BOHOL;?></td>
					<td><?php echo $total_count_of_female_GRD7_BOHOL;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BOHOL;?></td>
					<td><?php echo $total_count_of_major_GRD7_BOHOL;?></td>
					<td><?php echo $total_violation_GRD7_BOHOL;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Boracay</td>
					<td><?php echo $total_count_of_male_GRD7_BORACAY;?></td>
					<td><?php echo $total_count_of_female_GRD7_BORACAY;?></td>
					<td><?php echo $total_count_of_minor_GRD7_BORACAY;?></td>
					<td><?php echo $total_count_of_major_GRD7_BORACAY;?></td>
					<td><?php echo $total_violation_GRD7_BORACAY;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Camiguin</td>
					<td><?php echo $total_count_of_male_GRD7_CAMIGUIN;?></td>
					<td><?php echo $total_count_of_female_GRD7_CAMIGUIN;?></td>
					<td><?php echo $total_count_of_minor_GRD7_CAMIGUIN;?></td>
					<td><?php echo $total_count_of_major_GRD7_CAMIGUIN;?></td>
					<td><?php echo $total_violation_GRD7_CAMIGUIN;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Cebu</td>
					<td><?php echo $total_count_of_male_GRD7_CEBU;?></td>
					<td><?php echo $total_count_of_female_GRD7_CEBU;?></td>
					<td><?php echo $total_count_of_minor_GRD7_CEBU;?></td>
					<td><?php echo $total_count_of_major_GRD7_CEBU;?></td>
					<td><?php echo $total_violation_GRD7_CEBU;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Corrigidor</td>
					<td><?php echo $total_count_of_male_GRD7_CORRIGIDOR;?></td>
					<td><?php echo $total_count_of_female_GRD7_CORRIGIDOR;?></td>
					<td><?php echo $total_count_of_minor_GRD7_CORRIGIDOR;?></td>
					<td><?php echo $total_count_of_major_GRD7_CORRIGIDOR;?></td>
					<td><?php echo $total_violation_GRD7_CORRIGIDOR;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Davao</td>
					<td><?php echo $total_count_of_male_GRD7_DAVAO;?></td>
					<td><?php echo $total_count_of_female_GRD7_DAVAO;?></td>
					<td><?php echo $total_count_of_minor_GRD7_DAVAO;?></td>
					<td><?php echo $total_count_of_major_GRD7_DAVAO;?></td>
					<td><?php echo $total_violation_GRD7_DAVAO;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Dumaguete</td>
					<td><?php echo $total_count_of_male_GRD7_DUMAGUETE;?></td>
					<td><?php echo $total_count_of_female_GRD7_DUMAGUETE;?></td>
					<td><?php echo $total_count_of_minor_GRD7_DUMAGUETE;?></td>
					<td><?php echo $total_count_of_major_GRD7_DUMAGUETE;?></td>
					<td><?php echo $total_violation_GRD7_DUMAGUETE;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Einstein</td>
					<td><?php echo $total_count_of_male_GRD7_EINSTEIN;?></td>
					<td><?php echo $total_count_of_female_GRD7_EINSTEIN;?></td>
					<td><?php echo $total_count_of_minor_GRD7_EINSTEIN;?></td>
					<td><?php echo $total_count_of_major_GRD7_EINSTEIN;?></td>
					<td><?php echo $total_violation_GRD7_EINSTEIN;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>El Nido</td>
					<td><?php echo $total_count_of_male_GRD7_EL_NIDO;?></td>
					<td><?php echo $total_count_of_female_GRD7_EL_NIDO;?></td>
					<td><?php echo $total_count_of_minor_GRD7_EL_NIDO;?></td>
					<td><?php echo $total_count_of_major_GRD7_EL_NIDO;?></td>
					<td><?php echo $total_violation_GRD7_EL_NIDO;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Laoag</td>
					<td><?php echo $total_count_of_male_GRD7_LAOAG;?></td>
					<td><?php echo $total_count_of_female_GRD7_LAOAG;?></td>
					<td><?php echo $total_count_of_minor_GRD7_LAOAG;?></td>
					<td><?php echo $total_count_of_major_GRD7_LAOAG;?></td>
					<td><?php echo $total_violation_GRD7_LAOAG;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Mactan</td>
					<td><?php echo $total_count_of_male_GRD7_MACTAN;?></td>
					<td><?php echo $total_count_of_female_GRD7_MACTAN;?></td>
					<td><?php echo $total_count_of_minor_GRD7_MACTAN;?></td>
					<td><?php echo $total_count_of_major_GRD7_MACTAN;?></td>
					<td><?php echo $total_violation_GRD7_MACTAN;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Pagsanjan</td>
					<td><?php echo $total_count_of_male_GRD7_PAGSANJAN;?></td>
					<td><?php echo $total_count_of_female_GRD7_PAGSANJAN;?></td>
					<td><?php echo $total_count_of_minor_GRD7_PAGSANJAN;?></td>
					<td><?php echo $total_count_of_major_GRD7_PAGSANJAN;?></td>
					<td><?php echo $total_violation_GRD7_PAGSANJAN;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Puerto Gallera</td>
					<td><?php echo $total_count_of_male_GRD7_PUERTO_GALLERA;?></td>
					<td><?php echo $total_count_of_female_GRD7_PUERTO_GALLERA;?></td>
					<td><?php echo $total_count_of_minor_GRD7_PUERTO_GALLERA;?></td>
					<td><?php echo $total_count_of_major_GRD7_PUERTO_GALLERA;?></td>
					<td><?php echo $total_violation_GRD7_PUERTO_GALLERA;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Puerto Princesa</td>
					<td><?php echo $total_count_of_male_GRD7_PUERTO_PRINCESA;?></td>
					<td><?php echo $total_count_of_female_GRD7_PUERTO_PRINCESA;?></td>
					<td><?php echo $total_count_of_minor_GRD7_PUERTO_PRINCESA;?></td>
					<td><?php echo $total_count_of_major_GRD7_PUERTO_PRINCESA;?></td>
					<td><?php echo $total_violation_GRD7_PUERTO_PRINCESA;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>SPFL</td>
					<td><?php echo $total_count_of_male_GRD7_SPFL;?></td>
					<td><?php echo $total_count_of_female_GRD7_SPFL;?></td>
					<td><?php echo $total_count_of_minor_GRD7_SPFL;?></td>
					<td><?php echo $total_count_of_major_GRD7_SPFL;?></td>
					<td><?php echo $total_violation_GRD7_SPFL;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>SPA</td>
					<td><?php echo $total_count_of_male_GRD7_SPA;?></td>
					<td><?php echo $total_count_of_female_GRD7_SPA;?></td>
					<td><?php echo $total_count_of_minor_GRD7_SPA?></td>
					<td><?php echo $total_count_of_major_GRD7_SPA;?></td>
					<td><?php echo $total_violation_GRD7_SPA;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Subic</td>
					<td><?php echo $total_count_of_male_GRD7_SUBIC;?></td>
					<td><?php echo $total_count_of_female_GRD7_SUBIC;?></td>
					<td><?php echo $total_count_of_minor_GRD7_SUBIC?></td>
					<td><?php echo $total_count_of_major_GRD7_SUBIC;?></td>
					<td><?php echo $total_violation_GRD7_SUBIC;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Tagaytay</td>
					<td><?php echo $total_count_of_male_GRD7_TAGAYTAY;?></td>
					<td><?php echo $total_count_of_female_GRD7_TAGAYTAY;?></td>
					<td><?php echo $total_count_of_minor_GRD7_TAGAYTAY?></td>
					<td><?php echo $total_count_of_major_GRD7_TAGAYTAY;?></td>
					<td><?php echo $total_violation_GRD7_TAGAYTAY;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
				<tr>
					<td>Vigan</td>
					<td><?php echo $total_count_of_male_GRD7_VIGAN;?></td>
					<td><?php echo $total_count_of_female_GRD7_VIGAN;?></td>
					<td><?php echo $total_count_of_minor_GRD7_VIGAN?></td>
					<td><?php echo $total_count_of_major_GRD7_VIGAN;?></td>
					<td><?php echo $total_violation_GRD7_VIGAN;?></td>
					<td class="noExl">
						<a href="">
							<i class="meduim material-icons">visibility</i>
						</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>