


  import React, { Component } from 'react'

import axios from 'axios'
  export default class test1 extends Component {
      index() {
          axios.get('api/users').then((res)=> {
              console.log(res);
          })
      }

      insert() {


          axios.post('api/users', {
              "email" : "abcdefg@naver.com",
              "pwd" : "aewr4y2135",
              "name" : "jinheung",
          }).then((res) => {
              console.log(res);
          })
      }

      show() {
          axios.get('api/users/' + 1).then((res) => {
              console.log(res);
          })

      }

      login() {
          axios.get('api/users/' + 1).then((res) => {
              console.log(res);
          })

      }

      oauth2() {
          axios.get('/ouath/clients').then(res => {
              console.log(res.data);
          })
      }

      render() {
          return (
              <div>
                  <button onClick ={this.index}>index</button>
                  <button onClick ={this.insert}>insert</button>
                  <button onClick ={this.show}>show</button>
                  <button onClick ={this.oauth2}>login</button>
              </div>
          )
      }
  }
  