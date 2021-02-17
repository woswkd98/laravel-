
import React, { Component } from 'react'
import axios from 'axios'






export default class test1 extends Component {



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
    }


    render() {
        return (
            <div>
                <button onClick={this.register}>1111</button>
                <button onClick={this.login}>2222</button>
                <button onClick={this.logout}>2222</button>
                <button onClick={this.order}>3333</button>
                <button onClick={this.test}>4444</button>
            </div>
        )
    }
}



  