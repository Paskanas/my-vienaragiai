import axios from 'axios';
import { useEffect } from 'react';
import { useState } from 'react';
import { authConfig } from '../Functions/auth';

const Home = () => {
  const [list, setList] = useState([]);

  useEffect(() => {
    axios
      .get(
        'http://localhost/my-vienaragiai/react-login/backend/?url=home',
        authConfig()
      )
      .then((res) => setList(res.data));
  }, []);

  const logoutHandler = () => {
    console.log('logout');
  };

  return (
    <>
      <h1>Sveikiname prisijungus</h1>
      {list.map((item, i) => (
        <div key={i}>{item}</div>
      ))}
      <button onClick={logoutHandler}>
        Logout
      </button>
    </>
  );
};

export default Home;
