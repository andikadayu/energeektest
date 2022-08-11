import React, { useState, useEffect, useCallback } from 'react';
import ReactDOM from 'react-dom';
import Select from 'react-select';
import Swal from 'sweetalert2';
import axios from 'axios';

function Register() {


    const [joblist, setJoblist] = useState([]);
    const [skilllist, setSkilllist] = useState([]);
    const [yearlist, setYearlist] = useState([]);

    const globalHost = "http://localhost:8000";


    const handleSubmit = (event: any) => {
        event.preventDefault();
        let myForm = document.getElementById('form-apply-recruitment') as any;
        let formData = new FormData(myForm);
        axios.post(`${globalHost}/api/register`, formData)
            .then(res => {
                let status = res.data.status;
                let message = res.data.message;
                if (status === 'success') {

                    Swal.fire({
                        title: 'Berhasil',
                        text: message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '/';
                    }).catch(err => {
                        console.log(err);
                    }
                    );
                } else {
                    Swal.fire({
                        title: 'Terjadi Kesalahan',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        console.log(message);
                    }).catch(err => {
                        console.log(err);
                    }
                    );
                }
            }).catch(err => {
                Swal.fire({
                    title: 'Error',
                    text: 'Register Failed',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
            );
    }

    const getListJob = useCallback(() => {
        axios.get(`${globalHost}/api/jobs`)
            .then(res => {
                let myjob: any = [];
                res.data.jobs.forEach((_element: any) => {
                    myjob.push({ value: _element.id, label: _element.name });
                })
                setJoblist(myjob);
            }).catch(err => {
                console.log(err);
            }
            );
    }, []);

    const getListSkill = useCallback(() => {
        axios.get(`${globalHost}/api/skills`)
            .then(res => {
                let myskils: any = [];
                res.data.skills.forEach((_element: any) => {
                    myskils.push({ value: _element.id, label: _element.name });
                });
                setSkilllist(myskils);
            }).catch(err => {
                console.log(err);
            }
            );
    }, []);

    const getListYear = useCallback(() => {
        axios.get(`${globalHost}/api/years`)
            .then(res => {
                let yearlists: any = [];
                res.data.years.forEach((_element: any) => {
                    yearlists.push({
                        value: _element,
                        label: _element
                    });
                });
                setYearlist(yearlists);
            }).catch(err => {
                console.log(err);
            }
            );
    }, []);

    useEffect(() => {
        getListJob();
        getListSkill();
        getListYear();
    }, [getListJob, getListSkill, getListYear]);

    return (
        <div className="register-boxs">
            <div className="register-logo mt-3">
                <img src="energeek.png" alt="energeek" />
            </div>

            <div className="card">
                <div className="card-body register-card-body">
                    <p className="login-box-msg apply-header">Apply Lamaran</p>

                    <form method="post" id='form-apply-recruitment' onSubmit={handleSubmit}>
                        <div className="form-group">
                            <label htmlFor="inputname" className='input-label'>Nama</label>
                            <input type="text" id='inputname' name='name' className="form-control" placeholder="Nama" required />

                        </div>
                        <div className="form-group">
                            <label htmlFor="inputjabatan" className='input-label'>Jabatan</label>
                            <Select options={joblist} name='jabatan' placeholder="Jabatan" />

                        </div>
                        <div className="form-group">
                            <label htmlFor="inputtelepon" className='input-label'>Telepon</label>
                            <input type="number" id='inputtelepon' name='phone' className="form-control" placeholder="Cth: 0893239851289" required />

                        </div>
                        <div className="form-group">
                            <label htmlFor="inputemail" className='input-label'>Email</label>
                            <input type="email" id='inputemail' name='email' className="form-control" placeholder="Cth: energeekmail@gmail.com" required />

                        </div>
                        <div className="form-group">
                            <label htmlFor="inputtl" className='input-label'>Tahun Lahir</label>
                            <Select options={yearlist} name='tahunlahir' placeholder="Pilih Tahun" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="inputname" className='input-label'>Skill Set</label>
                            <Select options={skilllist} name='skillset[]' placeholder="Skill Set" isMulti={true} />

                        </div>

                        <button type="submit" className="btn-apply">Apply</button>
                    </form>


                </div>
            </div>
        </div>
    );
}

export default Register;

if (document.getElementById('register-app')) {
    ReactDOM.render(<Register />, document.getElementById('register-app'));
}
