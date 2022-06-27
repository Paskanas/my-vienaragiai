import axios from 'axios';
import { useContext } from 'react';
import {
  useEffect,
  useState,
} from 'react';
import {
  authConfig,
  login,
} from '../Functions/auth';
import DataContext from './DataContext';

function Login() {
  const { setPageRefresh } = useContext(
    DataContext
  );

  const [loginData, setLoginData] =
    useState(null);
  const [name, setName] = useState('');
  const [pass, setPass] = useState('');

  const doLogin = () => {
    setLoginData({
      name,
      password: pass,
    });
  };

  useEffect(() => {
    if (loginData === null) return;
    axios
      .post(
        'http://manobankas.lt/api/login',
        loginData
      )
      .then((res) => {
        if (res.data.token) {
          login(res.data.token);
          setPageRefresh((r) => !r);
        }
        console.log(res.data);
      });
  }, [loginData, setPageRefresh]);

  return (
    <>
      <form>
        <div className="nice-input">
          Name:{' '}
          <input
            type="text"
            value={name}
            onChange={(e) =>
              setName(e.target.value)
            }
          ></input>
        </div>
        <div className="nice-input">
          Password:{' '}
          <input
            type="password"
            value={pass}
            onChange={(e) =>
              setPass(e.target.value)
            }
          ></input>
        </div>
        <button
          type="button"
          className="btn login"
          onClick={doLogin}
        >
          Login
        </button>
      </form>
    </>
  );
}

export default Login;
