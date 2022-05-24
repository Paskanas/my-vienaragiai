import {
  useEffect,
  useState,
} from 'react';
import axios from 'axios';
import './App011.css';
import Katinukai from './Katinukai';

function App011() {
  const [button, setButton] =
    useState(1);

  const [cats, setCats] = useState([]);
  const [namas, setNamas] =
    useState('Namas');
  useEffect(() => {}, [
    setCats,
    button,
  ]);

  const buttonHandler = () => {
    setButton(button + 1);
    setCats([
      ...cats,
      `Murkis ${button}`,
    ]);
  };

  const addNamas = () => {
    setNamas(namas + ' namas');
  };

  useEffect(() => {
    axios
      .get(
        'http://localhost/my-vienaragiai/reactjs1/src/components/011/lesson/'
      )
      .then((res) => {
        console.log(res.data);
        setCats(res.data);
      });
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <h1>{button}</h1>
        {cats.map((value, i) => (
          <div key={i}>{value}</div>
        ))}
        <button onClick={buttonHandler}>
          Click me
        </button>
        <Katinukai />
        <button onClick={addNamas}>
          Add namas
        </button>
        {namas}
      </header>
    </div>
  );
}

export default App011;
