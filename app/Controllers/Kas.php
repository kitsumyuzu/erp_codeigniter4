<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Kas extends BaseController {

		public function auth_login()
		{
			$Schema = new Schema();

			$username = $this -> request -> getPost('username');
			$password = $this -> request -> getPost('password');

			if (filter_var($username, FILTER_VALIDATE_EMAIL))
			{	
				$_data = array('email' => $username, 'password' => md5($password));
			}
			else
			{
				$_data = array('username' => $username, 'password' => md5($password));
			};

			$data_filter = $Schema -> getWhere2('_user', $_data);

			if ($data_filter > 0)
			{
				session() -> set('id', $data_filter['id_user']);
				session() -> set('username', $data_filter['username']);
				session() -> set('email', $data_filter['email']);
				session() -> set('level', $data_filter['_level']);

				return redirect() -> to('/Kas/dashboard');
			}
			else
			{
				return redirect() -> to('/Kas/');
			};
		}

		public function auth_logout()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0)
			{
				session()->destroy();
				return redirect()->to('/Kas/');
			};
		}

	// [ Views ] ==================================================================================================== //

		public function index()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				echo view('uang_kas/_login');
			}
			else if (session()->get('id') > 0)
			{
				return redirect() -> to('/Kas/dashboard');
			};
		}

		public function dashboard()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0)
			{
				$Schema = new Schema();
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu', $data_menu);
				echo view('uang_kas/dashboard/index');
				echo view('uang_kas/_builder/footer');
			};
		}

		public function invoice()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0)
			{
				$Schema = new Schema();
				$on = 'kas_denda.invoice_denda = kas_invoice.id_invoice';
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));
				$data['data_invoice'] = $Schema->visual_table_join2('kas_invoice', 'kas_denda', $on);

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu', $data_menu);
				echo view('uang_kas/invoice/index',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function user()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'),[1,2]))
			{
				$Schema = new Schema();
				$on = '_user._level = _level.id_level';
				$data['data_user'] = $Schema->visual_table_join2('_user', '_level', $on);
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/user/index',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function view_update_user($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && session() -> get('level') == '3')
			{
				$Schema = new Schema();
				$on = 'guru.guru_user = _user.id_user';
				$data['data_rombel'] = $Schema->visual_table_orderby('kas_rombel', 'jurusan_rombel', 'asc');
				$data['data_guru'] = $Schema->getWhere_table_join_2('guru', '_user', $on, array('guru_user' => $id));
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/teacher/_update',$data);
				echo view('uang_kas/_builder/footer');
			}
			else if (session()->get('id') > 0 && session() -> get('level') == '4')
			{
				$Schema = new Schema();
				$on = 'murid.murid_user = _user.id_user';
				$data['data_rombel'] = $Schema->visual_table_orderby('kas_rombel', 'jurusan_rombel', 'asc');
				$data['data_murid'] = $Schema->getWhere_table_join_2('murid', '_user', $on, array('murid_user' => $id));
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/student/_update',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function teacher()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'), [1,2]))
			{
				$Schema = new Schema();
				$on = 'guru.guru_user = _user.id_user';
				$data['data_guru'] = $Schema->visual_table_join2('guru', '_user', $on);
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/teacher/index',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function view_create_teacher()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'), [1,2]))
			{
				$Schema = new Schema();
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/teacher/_create');
				echo view('uang_kas/_builder/footer');
			};
		}

		public function view_update_teacher($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'), [1,2]))
			{
				$Schema = new Schema();
				$on = 'guru.guru_user = _user.id_user';
				$data['data_rombel'] = $Schema->visual_table_orderby('kas_rombel', 'jurusan_rombel', 'asc');
				$data['data_guru'] = $Schema->getWhere_table_join_2('guru', '_user', $on, array('guru_user' => $id));
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/teacher/_update',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function student()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'), [1,2,3]))
			{
				$Schema = new Schema();
				$on = 'murid.murid_user = _user.id_user';
				$on2 = 'murid.murid_rombel = kas_rombel.id_rombel';
				$data['data_murid'] = $Schema->visual_table_join3('murid', '_user', 'kas_rombel', $on, $on2);
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/student/index',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function view_create_student()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'), [1,2]))
			{
				$Schema = new Schema();
				$data['data_rombel'] = $Schema->visual_table_orderby('kas_rombel', 'jurusan_rombel', 'asc');
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/student/_create',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function view_update_student($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}
			else if (session()->get('id') > 0 && in_array(session() -> get('level'), [1,2]))
			{
				$Schema = new Schema();
				$on = 'murid.murid_user = _user.id_user';
				$data['data_rombel'] = $Schema->visual_table_orderby('kas_rombel', 'jurusan_rombel', 'asc');
				$data['data_murid'] = $Schema->getWhere_table_join_2('murid', '_user', $on, array('murid_user' => $id));
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/student/_update',$data);
				echo view('uang_kas/_builder/footer');
			};
		}

		public function major()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}

			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
			{
				$Schema = new Schema();
				$data['data_jurusan'] = $Schema->visual_table_orderby('_jurusan', 'nama_jurusan', 'ASC');
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/major/index',$data);
				echo view('uang_kas/_builder/footer');
			}
			
			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function class()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}

			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
			{
				$Schema = new Schema();
				$data['data_kelas'] = $Schema->visual_table('_kelas');
				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/class/index',$data);
				echo view('uang_kas/_builder/footer');
			}
			
			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function rombel()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
			{
				return redirect()->to('/Kas/');
			}

			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
			{
				$Schema = new Schema();
				$on = 'kas_rombel.wali_kelas = guru.id_guru';
				$on2 = 'kas_rombel.ketua_kelas = murid.id_murid';
				$data['data_rombel'] = $Schema -> visual_table_join3('kas_rombel', 'guru', 'murid', $on, $on2);

				foreach ($data['data_rombel'] as &$row) {
					$studentKetua = $Schema->visual_table_kas($row['ketua_kelas']);
					$studentWakil = $Schema->visual_table_kas($row['wakil_ketua_kelas']);
					$studentBendahara = $Schema->visual_table_kas($row['bendahara']);
		
					$row['ketua_kelas'] = ucwords($studentKetua['murid_nama_depan'] . ' ' . $studentKetua['murid_nama_belakang']);
					$row['wakil_ketua_kelas'] = ucwords($studentWakil['murid_nama_depan'] . ' ' . $studentWakil['murid_nama_belakang']);
					$row['bendahara'] = ucwords($studentBendahara['murid_nama_depan'] . ' ' . $studentBendahara['murid_nama_belakang']);
				}

				$data['data_kelas'] = $Schema->visual_table('_kelas');
				$data['data_jurusan'] = $Schema->visual_table_orderby('_jurusan', 'nama_jurusan', 'asc');
				$data['data_murid'] = $Schema->visual_table_orderby('murid', 'murid_nama_depan', 'asc');
				$data['data_guru'] = $Schema->visual_table_orderby('guru', 'guru_nama_depan', 'asc');

				$data_menu['menu'] = $Schema->getWhere2('_user', array('id_user' => session() -> get('id')));

				echo view('uang_kas/_builder/header');
				echo view('uang_kas/_builder/menu',$data_menu);
				echo view('uang_kas/rombel/index',$data);
				echo view('uang_kas/_builder/footer');
			}
			
			else
			{
				return redirect()->to('/Kas/');
			}
		}

	// [ Create Data ] ==================================================================================================== //

		public function create_major()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $major_name = $this->request->getpost('majoring_name');
				$data = array(
					'nama_jurusan' => $major_name,
					'jurusan_createdAt' => date('Y-m-d H:i:s'),
					'jurusan_createdBy' => session()->get('id'),
				);

				$Schema = new Schema();
				$Schema->create_data('_jurusan', $data);

				return redirect()->to('/Kas/major');
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function create_class()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $class_name = $this->request->getpost('class');
				$data = array(
					'nama_kelas' => $class_name,
					'kelas_createdAt' => date('Y-m-d H:i:s'),
					'kelas_createdBy' => session()->get('id'),
				);

				$Schema = new Schema();
				$Schema->create_data('_kelas', $data);

				return redirect()->to('/Kas/class');
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function create_rombel()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $majoring = $this->request->getpost('majoring');
                $class = $this->request->getpost('class');
                $class_group = $this->request->getpost('class_group');
                $homeroom_teacher = $this->request->getpost('homeroom_teacher');
                $class_leader = $this->request->getpost('leader');
                $class_coleader = $this->request->getpost('co_leader');
                $treasurer = $this->request->getpost('treasurer');
                $payment = $this->request->getpost('payment');
				$data = array(
					'jurusan_rombel' => $majoring . ' ' . $class . ' ' . $class_group,
					'wali_kelas' => $homeroom_teacher,
					'ketua_kelas' => $class_leader,
					'wakil_ketua_kelas' => $class_coleader,
					'bendahara' => $treasurer,
					'uangkas_rombel' => $payment,
				);

				$Schema = new Schema();
				$Schema->create_data('kas_rombel', $data);

				return redirect()->to('/Kas/rombel');
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function create_teacher()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $profile = $this->request->getFile('profile');
				
                $guru_nik = $this->request->getPost('nik');
                $guru_nama_depan = $this->request->getPost('nama_depan');
                $guru_nama_belakang = $this->request->getPost('nama_belakang');
                $guru_jenis_kelamin = $this->request->getPost('jenis_kelamin');
                $guru_tangagl_lahir = $this->request->getPost('tanggal_lahir');
                $guru_tempat_lahir = $this->request->getPost('tempat_lahir');
                $guru_no_handphone = $this->request->getPost('no_handphone');
                $guru_alamat = $this->request->getPost('alamat');

				if ($profile && $profile -> isValid() && ! $profile -> hasMoved())
				{
					if ($profile == 'default-profile.png' || NULL)
					{
						$images = $profile -> getRandomName();
						$profile -> move('_adminpage/assets/._user/', $images);
					}
					else
					{
						$images = $profile -> getRandomName();
						$profile -> move('_adminpage/assets/._user/', $images);
					}
				}
				else
				{
					$images = 'default-profile.png';
				}

				$Schema = new Schema();

				$data_user = array(
					'username' => $username,
					'email' => $email,
					'password' => md5($password),
					'_profile' => $images,
					'_level' => '3'
				);

				$Schema->create_data('_user', $data_user);
				$get_user = array('username' => $username);
				$where = $Schema->getWhere2('_user', $get_user);
				$id = $where['id_user'];

				$data_guru = array(
					'guru_nik' => $guru_nik,
					'guru_nama_depan' => $guru_nama_depan,
					'guru_nama_belakang' => $guru_nama_belakang,
					'guru_jenis_kelamin' => $guru_jenis_kelamin,
					'guru_tanggal_lahir' => $guru_tangagl_lahir,
					'guru_tempat_lahir' => $guru_tempat_lahir,
					'guru_no_handphone' => $guru_no_handphone,
					'guru_alamat' => $guru_alamat,
					'guru_user' => $id
				);

				$Schema ->create_data('guru', $data_guru);

				if ($data_guru)
				{
					session() -> setFlashdata('message', 'guru baru berhasil di tambahkan.');
					return redirect() -> to('/Kas/teacher');
				}
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function create_student()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $profile = $this->request->getFile('profile');
				
                $murid_nis = $this->request->getPost('nis');
                $murid_nama_depan = $this->request->getPost('nama_depan');
                $murid_nama_belakang = $this->request->getPost('nama_belakang');
                $murid_jenis_kelamin = $this->request->getPost('jenis_kelamin');
                $murid_tangagl_lahir = $this->request->getPost('tanggal_lahir');
                $murid_tempat_lahir = $this->request->getPost('tempat_lahir');
                $murid_no_handphone = $this->request->getPost('no_handphone');
                $murid_alamat = $this->request->getPost('alamat');
				$murid_rombel = $this->request->getPost('rombel');

				if ($profile && $profile -> isValid() && ! $profile -> hasMoved())
				{
					if ($profile == 'default-profile.png' || NULL)
					{
						$images = $profile -> getRandomName();
						$profile -> move('_adminpage/assets/._user/', $images);
					}
					else
					{
						$images = $profile -> getRandomName();
						$profile -> move('_adminpage/assets/._user/', $images);
					}
				}
				else
				{
					$images = 'default-profile.png';
				}

				$Schema = new Schema();

				$data_user = array(
					'username' => $username,
					'email' => $email,
					'password' => md5($password),
					'_profile' => $images,
					'_level' => '4'
				);

				$Schema->create_data('_user', $data_user);
				$get_user = array('username' => $username);
				$where = $Schema->getWhere2('_user', $get_user);
				$id = $where['id_user'];

				$data_murid = array(
					'murid_nis' => $murid_nis,
					'murid_nama_depan' => $murid_nama_depan,
					'murid_nama_belakang' => $murid_nama_belakang,
					'murid_jenis_kelamin' => $murid_jenis_kelamin,
					'murid_tanggal_lahir' => $murid_tangagl_lahir,
					'murid_tempat_lahir' => $murid_tempat_lahir,
					'murid_no_handphone' => $murid_no_handphone,
					'murid_alamat' => $murid_alamat,
					'murid_user' => $id,
					'murid_rombel' => $murid_rombel
				);

				$Schema ->create_data('murid', $data_murid);

				if ($data_murid)
				{
					session() -> setFlashdata('message', 'murid baru berhasil di tambahkan.');
					return redirect() -> to('/Kas/student');
				}
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}

	// [ Update Data ] ==================================================================================================== //

		public function update_teacher()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2,3]))
            {
				$userId = $this->request->getPost('userId');
				$oldProfile = $this->request->getPost('oldProfile');

                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $profile = $this->request->getFile('profile');
				
				$guruUser = $this->request->getPost('userGuru');
                $guru_nik = $this->request->getPost('nik');
                $guru_nama_depan = $this->request->getPost('nama_depan');
                $guru_nama_belakang = $this->request->getPost('nama_belakang');
                $guru_jenis_kelamin = $this->request->getPost('jenis_kelamin');
                $guru_tangagl_lahir = $this->request->getPost('tanggal_lahir');
                $guru_tempat_lahir = $this->request->getPost('tempat_lahir');
                $guru_no_handphone = $this->request->getPost('no_handphone');
                $guru_alamat = $this->request->getPost('alamat');

				if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

					if ($profile == 'default.png' || 'default-profile.png' || NULL) {

						$images = $profile -> getRandomName();
						$profile -> move('_adminpage/assets/._user/', $images);

					} else {

						if (file_exists('_adminpage/assets/._user/'.$profile)) {

							unlink('_adminpage/assets/._user/'.$oldProfile);

						} else {

							$images = $profile -> getRandomName();
							$profile -> move('_adminpage/assets/._user/', $images);
							
						}

					}

				} else {

					if ($oldProfile == 'default-profile.png' || NULL) {

						$images = 'default-profile.png';

					} else {

						$images = $oldProfile;

					}

				}

				$Schema = new Schema();

				$data_user = array(
					'username' => $username,
					'email' => $email,
					'password' => md5($password),
					'_profile' => $images,
				);

				$Schema->update_data('_user', $data_user, array('id_user' => $userId));

				$data_guru = array(
					'guru_nik' => $guru_nik,
					'guru_nama_depan' => $guru_nama_depan,
					'guru_nama_belakang' => $guru_nama_belakang,
					'guru_jenis_kelamin' => $guru_jenis_kelamin,
					'guru_tanggal_lahir' => $guru_tangagl_lahir,
					'guru_tempat_lahir' => $guru_tempat_lahir,
					'guru_no_handphone' => $guru_no_handphone,
					'guru_alamat' => $guru_alamat,
				);

				$Schema->update_data('guru', $data_guru, array('guru_user' => $guruUser));

				if ($data_guru)
				{
					session() -> setFlashdata('message', 'guru baru berhasil di tambahkan.');
					return redirect() -> to('/Kas/teacher');
				}
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}

		public function update_student()
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }

            else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2,4]))
            {
				$userId = $this->request->getPost('userId');
				$oldProfile = $this->request->getPost('oldProfile');

                $username = $this->request->getPost('username');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $profile = $this->request->getFile('profile');
				
				$muridUser = $this->request->getPost('userMurid');
                $murid_nis = $this->request->getPost('nis');
                $murid_nama_depan = $this->request->getPost('nama_depan');
                $murid_nama_belakang = $this->request->getPost('nama_belakang');
                $murid_jenis_kelamin = $this->request->getPost('jenis_kelamin');
                $murid_tangagl_lahir = $this->request->getPost('tanggal_lahir');
                $murid_tempat_lahir = $this->request->getPost('tempat_lahir');
                $murid_no_handphone = $this->request->getPost('no_handphone');
                $murid_alamat = $this->request->getPost('alamat');
				$murid_rombel = $this->request->getPost('rombel');

				if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {

					if ($profile == 'default.png' || 'default-profile.png' || NULL) {

						$images = $profile -> getRandomName();
						$profile -> move('_adminpage/assets/._user/', $images);

					} else {

						if (file_exists('_adminpage/assets/._user/'.$profile)) {

							unlink('_adminpage/assets/._user/'.$oldProfile);

						} else {

							$images = $profile -> getRandomName();
							$profile -> move('_adminpage/assets/._user/', $images);
							
						}

					}

				} else {

					if ($oldProfile == 'default-profile.png' || NULL) {

						$images = 'default-profile.png';

					} else {

						$images = $oldProfile;

					}

				}

				$Schema = new Schema();

				$data_user = array(
					'username' => $username,
					'email' => $email,
					'password' => md5($password),
					'_profile' => $images,
				);

				$Schema->update_data('_user', $data_user, array('id_user' => $userId));

				$data_murid = array(
					'murid_nis' => $murid_nis,
					'murid_nama_depan' => $murid_nama_depan,
					'murid_nama_belakang' => $murid_nama_belakang,
					'murid_jenis_kelamin' => $murid_jenis_kelamin,
					'murid_tanggal_lahir' => $murid_tangagl_lahir,
					'murid_tempat_lahir' => $murid_tempat_lahir,
					'murid_no_handphone' => $murid_no_handphone,
					'murid_alamat' => $murid_alamat,
					'murid_rombel' => $murid_rombel
				);

				$Schema->update_data('murid', $data_murid, array('murid_user' => $muridUser));

				if ($data_murid)
				{
					session() -> setFlashdata('message', 'murid berhasil di perbaharui.');
					return redirect() -> to('/Kas/student');
				}
            }

			else
			{
				return redirect()->to('/Kas/');
			}
		}
	

	// [ Delete Data ] ==================================================================================================== //

		public function drop_major($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }
            
			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $Schema = new Schema();
				$Schema -> delete_data('_jurusan', array('id_jurusan' => $id));

				return redirect()->to('/Kas/major');
			}

			else
            {
                return redirect()->to('/Kas/');
            }
		}

		public function drop_class($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }
            
			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $Schema = new Schema();
				$Schema -> delete_data('_kelas', array('id_kelas' => $id));

				return redirect()->to('/Kas/class');
			}

			else
            {
                return redirect()->to('/Kas/');
            }
		}
		
		public function drop_teacher($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }
            
			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $Schema = new Schema();
				$Schema -> delete_data('_user', array('id_user' => $id));
				$Schema -> delete_data('guru', array('guru_user' => $id));

				return redirect()->to('/Kas/teacher');
			}

			else
            {
                return redirect()->to('/Kas/');
            }
		}

		public function drop_student($id)
		{
			if (session()->get('id') < 0 || session()->get('id') == null || session()->get('id') == ' ')
            {
                return redirect()->to('/Kas/');
            }
            
			else if (session()->get('id') > 0 && in_array(session()->get('level'),[1,2]))
            {
                $Schema = new Schema();
				$Schema -> delete_data('_user', array('id_user' => $id));
				$Schema -> delete_data('murid', array('murid_user' => $id));

				return redirect()->to('/Kas/student');
			}

			else
            {
                return redirect()->to('/Kas/');
            }
		}


}