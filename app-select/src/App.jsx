import './App.css';
import { useState } from 'react';

function App() {
  const [select, setSelect] =
    useState('v');
  const [checkbox, setCheckbox] =
    useState({
      m: false,
      b: true,
      z: false,
    });

  const changeHandler = (val) => {
    setCheckbox((c) => ({
      ...c,
      [val]: !c[val],
    }));
  };

  return (
    <div className="App">
      <header className="App-header">
        <h1>Do select: {select}</h1>
        <select
          value={select}
          onChange={(e) =>
            setSelect(e.target.value)
          }
        >
          <option value="m">
            Meska
          </option>
          <option value="b">
            Briedis
          </option>
          <option value="z">
            Zebras
          </option>
          <option value="m"></option>
          <option value="v">
            Vilkas, Valkata, Vovere
          </option>
        </select>
        <h2>Do checkbox</h2>
        <div>
          Meska
          <input
            checked={checkbox.m}
            onChange={() =>
              changeHandler('m')
            }
            type="checkbox"
            value="m"
          />
        </div>
        <div>
          Zebras
          <input
            checked={checkbox.z}
            onChange={() =>
              changeHandler('z')
            }
            type="checkbox"
            value="z"
          />
        </div>
        <div>
          Briedis
          <input
            checked={checkbox.b}
            onChange={() =>
              changeHandler('b')
            }
            type="checkbox"
            value="b"
          />
        </div>
      </header>
    </div>
  );
}

export default App;
