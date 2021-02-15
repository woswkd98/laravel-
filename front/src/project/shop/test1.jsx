
import React, { Component } from 'react'
import axios from 'axios'






export default class test1 extends Component {


    register() {
        axios.post('api/users/register' ,{
            email : 'ccc@naver.com', //'abcd@naver.com',
            password : 'aabbbccc1', //'password1',
            name : '이름'
        }).then(res => {
            console.log(res);
        })
    }
    login() {

        axios.post('api/users/login' ,{
            user_id : 'ccc@naver.com', //'abcd@naver.com',
            password : 'aabbbccc1', //'password1',
        }).then(res => {
            console.log(res.data)
            axios.defaults.headers.common['Authorization'] = res.data;



        });





    }

    logout() {
        console.log(axios.defaults.headers.common['Authorization']);
        axios.get('api/users/logout').then(res => {
            console.log(res);
        })



    }

    render() {
        return (
            <div>
                <button onClick={this.register}>1111</button>
                <button onClick={this.login}>2222</button>
                <button onClick={this.logout}>2222</button>
            </div>
        )
    }
}



  