import {
  authConfig,
  login,
} from '../Functions/auth';

const Login = () => {
  const loginHandler = ({
    setLogedIn,
  }) => {
    console.log('login');
    login('lalala');
    setLogedIn(authConfig());
  };

  return (
    <>
      <button onClick={loginHandler}>
        Login
      </button>
    </>
  );
};

export default Login;
