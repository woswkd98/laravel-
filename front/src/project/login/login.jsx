import React, {Component} from "react";
import axios from "axios";

export default class login extends Component {
    /*
    register() {
        axios.post('api/users/register' ,{
            email : 'ccc@naver.com', //'abcd@naver.com',
            password : 'aabbbccc1', //'password1',
            name : '이름'
        }).then(res => {
            console.log(res);
        })
    }


    logout() {
        console.log(axios.defaults.headers.common['Authorization']);
        axios.get('api/users/logout/1').then(res => {
            console.log(res);
        })
    }

    order() {
        axios.post('api/order', {
            seller_id : 1,
            buyer_id : 1,
            price : 2000,
        }).then(res => {
            console.log(res);
        })
    }

    test() {
        axios.post('api/test1', {
            seller_id : 5,
            buyer_id : 3
        }).then(res => {
            console.log(res);
        })
    }*/


    constructor(props) {
        super(props);
        this.email = React.createRef();
        this.password = React.createRef();
    }

    login() {

        axios.post('api/users/login' ,{
            user_id : 'ccc@naver.com', //'abcd@naver.com',
            password : 'aabbbccc1', //'password1',
        }).then(res => {
            //console.log(res.headers)
            if(res.data.isOk === true) {
                return this.props.history.push('/');
            }
        });
    }

    goToKakaoLogin() {
        axios.post('jinHeung' ,{
            user_id : 'ccc@naver.com', //'abcd@naver.com',
            password : 'aabbbccc1', //'password1',
        }).then(res => {
            //console.log(res.headers)
            if(res.data.isOk === true) {
                return this.props.history.push('/');
            }
        });
    }
    render() {
        return (
            <div>
                <button onClick={this.goToKakaoLogin}>gotoKakao</button>
                <button onClick={this.login}>login</button>
            </div>
        )
    }
}

