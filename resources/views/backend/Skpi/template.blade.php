<html>
    <head>
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 2.54cm
            }

            body {
            	font-family: sans-serif;
            }

            header {
                position: fixed;
                top: -2.54cm;
                left: 0px;
                right: 0px;
                height: 2.54cm;
                font-size: 8pt;
                text-align: center;
                z-index: 1;
                order: 2;
            }

            header .bg {
            	margin-top: 12cm;
            	height: 3cm;
            	opacity: 0.2;
            }

            footer {
                position: fixed; 
                bottom: -2.54cm; 
                left: 0px; 
                right: 0px;
                height: 2.54cm/*;*/
            }

            main {
            	z-index: 10;
            }

            .first-header {
            	position: fixed; 
            	top: -2.54cm; 
            	z-index: 2; 
            	order: 1;
            	left: -2.54cm; 
            	right: -2.54cm;
        	}

        	.title {
        		border-top: 1px solid #000;
        		border-bottom: 1px solid #000;
        		padding: 10px 25px;
        		margin-top: 10px;
        		font-size: 24pt;
        		font-weight: bold;
        	}

        	.title em {
        		font-size: 13pt;
        		font-weight: normal;
        	}

        	.content {
        		padding: 10px 25px;
        		font-size: 8pt;
        	}

        	.abstract p {
        		margin-top: 0px;
        	}

        	.section {
        		padding: 10px 0px;
        		border-top: 1px solid #000;
        	}

        	.section .header {
        		font-weight: bold;
        		font-size: 10pt;
        		margin-bottom: 10px;
        	}

        	.section .subheader {
        		font-weight: bold;
        		font-size: 10pt;
        		margin-bottom: 8px;
        	}

        	.section table {
        		font-size: 9pt;
        		page-break-inside: always;
        	}

        	.section table td {
        		padding: 0px;
        		width: 50%;
        		vertical-align: top;
        	}

        	.section table td p {
        		width: 100%;
        	}

        	.section table td:nth-child(odd) {
        		padding-right: 5px;
        	}

        	.section table td:nth-child(even) {
        		padding-left: 5px;
        	}

        	.section .dt {
        		margin: 0px;
        		font-weight: bold;
        		font-size: 9pt;
        		padding: 2px 5px;
        	}

        	.section .dti {
        		margin: 0px 0px 3px 0px;
        		font-style: italic;
        		font-size: 8pt;
        		padding: 2px 5px;
        	}

        	.section .dd {
        		padding: 4px 5px 5px;
        		margin: 0px 0px 10px 0px;
        		font-size: 7pt;
        		background: rgba(235, 235, 235, 0.7);
        		line-height: 1.5;
        	}

        	.section.learning-outcomes .dt {
        		padding: 4px 5px;
        		background: rgba(235, 235, 235, 0.7);
        	}

        	.section.learning-outcomes .subtitle {
        		background: rgba(235, 235, 235, 0.7);
        		font-weight: bold;
        		padding: 5px;
        		margin: 2px;
        		font-size: 9pt;
        	}

        	.section.learning-outcomes ol {
        		margin: 5px 0px 15px 0px;
        		padding-left: 30px;
        	}

        	.section.learning-outcomes ol li {
        		font-size: 8pt;
        		line-height: 1.5;
    		}

    		.signature {
    			margin-top: 50px;
    			margin-left: 25px;
    			font-size: 10pt
    		}

    		.signature p {
    			margin: 0px;
    			line-height: 1.3;
    		}

    		.signature .date {
    			font-weight: bold;
    		}

    		.signature .date_i {
    			font-style: italic;
    			font-size: 8pt;
    		}

    		.signature .chief_name {
    			margin-top: 85px;
    			text-decoration: underline;
    			font-weight: bold;
    		}

    		.footer {
    			border-top: 1px solid #000;
    			padding: 10px 25px;
    		}

    		.footer table {
    			font-size: 9pt;
    			line-height: 1.5;
    			width: 100%;
    		}

    		.footer table h6 {
    			margin-top: 0px;
    			font-size: 9pt;
    			width: 100%;
    		}

    		.footer table td {
    			vertical-align: top;
    		}

    		.footer table td:nth-child(odd) {
    			padding-right: 30px;
    		}

    		.footer table td:nth-child(even) {
    			padding-left: 30px;
    			width: 50%;
    		}

    		.footer table ul {
    			padding-left: 10px;
    			width: 100%;
    		}

    		.footer table ul li {
    			font-size: 8pt;
    			line-height: 1.5;
    			text-align: justify;
    		}

        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <table width="100%" style="margin: 0px auto; border-bottom: 1px solid #000">
            	<tr>
            		<td align="left" valign="middle" style="padding: 10px 0px">
            			<img src="{{ $logo_img }}" width="50" />
            		</td>
            		<td align="right" valign="middle">{{ $mahasiswa->User->name }} | NO: {{ $mahasiswa->Skpi->no }}</td>
            	</tr>
            </table>
            <img src="{{ $logo_img }}" class="bg" />
        </header>

        <footer>
        	<table width="100%" style="margin: 0px auto; border-top: 1px solid #000">
        		<tr>
        			<td align="left" valign="middle" style="padding: 15px 0px">
        			</td>
        		</tr>
        	</table>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
        	<div class="first-header">
        		<img src="{{ $first_header_img }}" width="100%" />
        	</div>

        	<div class="title">
        		SURAT KETERANGAN<br />
        		PENDAMPING IJAZAH<br />
        		<em>Diploma Supplement</em>
        	</div>

        	<div class="content">
        		<div class="abstract">
        			<p>Surat Keterangan Pendamping Ijazah (SKPI) ini mengacu pada Kerangka Kualifikasi Nasional Indonesia (KKNI) dan Konvensi Unesco tentang pengakuan studi, ijazah dan gelar pendidikan tinggi. Tujuan dari SKPI ini adalah menjadi dokumen yang menyatakan kemampuan kerja, penguasaan pengetahuan, dan sikap/moral pemegangnya.</p>

        			<p style="font-style: italic;">This Diploma Supplement refers to the Indonesian Qualification Framework and UNESCO Convention on the Recognition of Studies, Diplomas and Degrees in Higher Education. The purpose of the supplement is to provide a description of the nature, level, context and status of the studies that were pursued and successfully completed by the individual named on the original qualiﬁcation to which this supplement is appended.</p>
        		</div>

        		<div class="section student-identity">
        			<div class="header">01. INFORMASI TENTANG IDENTITAS DIRI PEMEGANG SKPI</div>

        			<table width="100%">
        				<tr>
        					<td>
        						<p class="dt">Nama Lengkap</p>
        						<p class="dti">Full Name</p>
        						<p class="dd">{{ $mahasiswa->User->name }}</p>
        					</td>
        					<td>
        						<p class="dt">Tahun Lulus</p>
        						<p class="dti">Year of Completion</p>
        						<p class="dd">{{ $mahasiswa->thn_lulus }}</p>
        					</td>
        				</tr>
        				<tr>
        					<td>
        						<p class="dt">Tempat dan Tanggal Lahir</p>
        						<p class="dti">Date and Place of Birth</p>
        						<p class="dd">{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->ttl }}</p>
        					</td>
        					<td>
        						<p class="dt">Gelar</p>
        						<p class="dti">Name of Qualification</p>
        						<p class="dd">{{ $mahasiswa->Gelar->name }}</p>
        					</td>
        				</tr>
        				<tr>
        					<td>
        						<p class="dt">Nomor Induk Mahasiswa</p>
        						<p class="dti">Student Identification Number</p>
        						<p class="dd">{{ $mahasiswa->npm }}</p>
        					</td>
        					<td>
        						<p class="dt">Nomor Ijazah</p>
        						<p class="dti">Diploma Number</p>
        						<p class="dd">{{ $mahasiswa->no_ijazah }}</p>
        					</td>
        				</tr>
        			</table>
        		</div>

        		<div class="section institution-identity">
        			<div class="header">02. INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</div>

        			<table width="100%">
        				<tr>
        					<td>
        						<p class="dt">SK Pendirian Perguruan Tinggi</p>
        						<p class="dti">Awarding Insitution's License</p>
        						<p class="dd">{{ $kampus->sk_pendirian }}</p>
        					</td>
        					<td>
        						<p class="dt">Persyaratan Penerimaan</p>
        						<p class="dti">Entry Requirements</p>
        						<p class="dd">{{ $kampus->persyaratan_penerimaan }}</p>
        					</td>
        				</tr>
        				<tr>
        					<td>
        						<p class="dt">Nama Perguruan Tinggi</p>
        						<p class="dti">Awarding Institution</p>
        						<p class="dd">{{ $kampus->nama }}</p>
        					</td>
        					<td>
        						<p class="dt">Bahasa Pengantar Kuliah</p>
        						<p class="dti">Language of Instruction</p>
        						<p class="dd">
        							{{ $kampus->bahasa }}
        						</p>
        					</td>
        				</tr>
        				<tr>
        					<td>
        						<p class="dt">Program Studi</p>
        						<p class="dti">Major</p>
        						<p class="dd">
        							{{ $mahasiswa->ProgramStudi->name }}<br />
        							Kelas: {{ $mahasiswa->Kelas->name }}<br />
        							Program: {{ $mahasiswa->ProgramStudi->name }}</p>
        					</td>
        					<td>
        						<p class="dt">Sistem Penilaian</p>
        						<p class="dti">Grading System</p>
        						<p class="dd">{{ $kampus->sistem_penilaian }}</p>
        					</td>
        				</tr>
        				<tr>
        					<td>
        						<p class="dt">Jenis & Jenjang Pendidikan</p>
        						<p class="dti">Type & Level of Education</p>
        						<p class="dd">{{ $kampus->jenis_pendidikan }}</p>
        					</td>
        					<td>
        						<p class="dt">Jenis & Jenjang Pendidikan Lanjutan</p>
        						<p class="dti">Access to Further Study</p>
        						<p class="dd">Program Magister & Doktoral</p>
        					</td>
        				</tr>
        				<tr>
        					<td>
        						<p class="dt">Jenkang Kualifikasi Sesuai KKNI</p>
        						<p class="dti">Level of Qualification in the National Qualification <br />Framework</p>
        						<p class="dd">{{ $kampus->jenjang_kualifikasi }}</p>
        					</td>
        					<td>
        						<p class="dt">Status Profesi (Bila Ada)</p>
        						<p class="dti">Professional Status (If Applicable)</p>
        						<p class="dd">-</p>
        					</td>
        				</tr>
        			</table>
        		</div>
        		<div class="section learning-outcomes">
        			<div class="header">03. INFORMASI TENTANG KUALIFIKASI DAN HASIL YANG DICAPAI</div>
        			<div class="subheader">A. Capaian Pembelajaran</div>

        			<table width="100%" style="margin-bottom: 15px">
        				<tr>
        					<td>
        						<p class="dt"><strong>{{ $mahasiswa->Gelar->name }} : {{ $mahasiswa->ProgramStudi->name }}</strong></p>
        					</td>
        					<td>
        						<p class="dt"><strong>KKNI {{ $kampus->jenjang_kualifikasi }}</strong></p>
        					</td>
        				</tr>
        			</table>

        			@foreach ($deskriptor as $d)
        			<div class="subtitle">{{ $d->deskriptor }}</div>
        			<ol>
        				@foreach ($mahasiswa->getCapaianPembelajaran($d->id, $kualifikasi_nilai) as $cp)
        				<li>{{ $cp }}</li>
        				@endforeach
        			</ol>
        			@endforeach

                    <div class="subheader">B. Aktivitas Prestasi dan Penghargaan</div>

                    @foreach ($kegiatan as $k)
                    <div class="subtitle">Mahasiswa {{ $k->deskriptor }}:</div>
                    <ol>
                        @foreach ($k->sertifikasi as $s)
                        <li>{{ $s->getName() }}</li>
                        @endforeach
                    </ol>
                    @endforeach
        		</div>
        		<div class="section legalization">
        			<div class="header">04. PENGESAHAN SKPI</div>
        			
        			<div class="signature">
        				<p class="date">BANDUNG, {{ $id_date }}</p>
        				<p class="date_i">BANDUNG, {{ $en_date }}</p>

        				<p class="chief_name">{{ $kampus->ketua_yayasan }}</p>
        				<p class="chief_position">KETUA YAYASAN {{ $kampus->nama }}</p>
        				<p class="chief_id">NOMOR INDUK PEGAWAI: {{ $kampus->nip_ketua_yayasan }}</p>
        			</div>
        		</div>
        	</div>
        	<div class="footer">
        		<table width="100%" style="margin-bottom: 15px">
        			<tr>
        				<td width="50%">
        					<h6 style="margin-bottom: 0px;">Catatan Resmi</h6>
        					<ul>
        						<li>SKPI dikeluarkan oleh institusi pendidikan tinggi yang berwenang mengeluarkan ijazah sesuai dengan paraturan perundang-undangan yang berlaku.</li>
        						<li>SKPI hanya diterbitkan setelah mahasiswa dinyatakan lulus dari suatu program studi secara resmi oleh Perguruan Tinggi.</li>
        						<li>SKPI diterbitkan dalam Bahasa Indonesia dan Bahasa Inggris.</li>
        						<li>SKPI yang asli diterbitkan mengunakan kertas khusus (barcode/halogram security paper) berlogo Perguruan Tinggi, yang diterbitkan secara khusus oleh Perguruan Tinggi.</li>
        						<li>Penerima SKPI dicantumkan dalam situs resmi Perguruan Tinggi.</li>
        					</ul>
        				</td>
        				<td>
        					<h6>Alamat</h6>
        					<strong>{{ $kampus->nama}}</strong><br />
        					{{ $kampus->alamat}}<br /><br />
        					Telp {{ $kampus->telepon }}
        				</td>
        			</tr>
        		</table>
        	</div>
        </main>
    </body>
</html>