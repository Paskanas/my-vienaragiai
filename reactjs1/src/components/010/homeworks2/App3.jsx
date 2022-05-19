import { useState } from 'react';
import './App3.css';
function App() {
  const [radius, setRadius] = useState(
    []
  );
  const [radius2, setRadius2] =
    useState([]);
  const [random, setRandom] = useState(
    5 +
      Math.round(Math.random() * 20, 0)
  );
  const [number, setNumber] =
    useState(0);
  const [squares, setSquares] =
    useState([]);
  const [squares2, setSquares2] =
    useState([]);

  const changeFigure = () => {
    setRadius((oldRadius) =>
      oldRadius === '0%' ? '50%' : '0%'
    );
  };
  const changeFigure2 = () => {
    setRadius2((oldRadius) =>
      oldRadius === '0%' ? '50%' : '0%'
    );
  };

  const changeRandom = () => {
    setRandom(
      5 +
        Math.round(
          Math.random() * 20,
          0
        )
    );
  };

  const addNumber = () => {
    setNumber(number + 1);
  };
  const minusNumber = () => {
    setNumber(number - 3);
  };

  const addSquare = () => {
    setSquares([...squares, '']);
  };

  const addRed = () => {
    setSquares2([...squares2, 'red']);
  };
  const addBlue = () => {
    setSquares2([...squares2, 'blue']);
  };
  const reset = () => {
    setSquares2([]);
  };

  return (
    <div className="App">
      <header className="App-header">
        <button onClick={changeFigure}>
          Change
        </button>
        <div
          className="cirkle"
          style={{
            borderRadius: radius,
          }}
        ></div>
        <button onClick={changeFigure2}>
          Change
        </button>
        <button onClick={changeRandom}>
          Random
        </button>
        <div
          className="cirkle"
          style={{
            borderRadius: radius2,
          }}
        >
          {random}
        </div>
        <button onClick={addNumber}>
          Plus
        </button>
        <button onClick={minusNumber}>
          Minus
        </button>
        <h1>{number}</h1>
        <button onClick={addSquare}>
          Add
        </button>
        <div className="squareContainer">
          {squares.map((square, i) => (
            <div
              key={i}
              className="square"
            ></div>
          ))}
        </div>

        <button onClick={addRed}>
          Add red
        </button>
        <button onClick={addBlue}>
          Add blue
        </button>
        <button onClick={reset}>
          Reset
        </button>
        <div className="squareContainer">
          {squares2.map((square, i) => (
            <div
              className="square"
              key={i}
              style={{
                backgroundColor: square,
              }}
            ></div>
          ))}
        </div>
      </header>
    </div>
  );
}

export default App;
