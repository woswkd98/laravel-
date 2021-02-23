import React from 'react';



import Test1 from './project/shop/test1';
import Login from './project/login/login'

import { Route } from 'react-router-dom';
function App() {
  return (
    <div className="App">
        <Route exact path="kakao/redirection" component={Test1}/>
        <Login/>
    </div>
  );
}

export default App;
