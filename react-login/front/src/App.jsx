import { useState } from 'react';
import './App.css';
import Home from './Components/Home';
import Login from './Components/Login';
import { login } from './Functions/auth';

function App() {
  const [logedIn, setLogedIn] =
    useState(false);

  // login('lalala');

  return (
    <div className="App">
      <header className="App-header">
        {
          /*!logedIn && */ <Login
            setLogedIn={setLogedIn}
          />
        }
        {
          /*logedIn && */ <Home
            setLogedIn={setLogedIn}
          />
        }
      </header>
    </div>
  );
}

export default App;
