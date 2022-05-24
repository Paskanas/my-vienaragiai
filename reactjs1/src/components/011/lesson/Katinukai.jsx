import React, {
  useEffect,
  useState,
} from 'react';
import axios from 'axios';

class Katinukai extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      data: [],
      button: 1,
      cats: [],
    };
    this.render();
  }

  // componentDidMount() {
  //   axios
  //     .get(
  //       'http://localhost/my-vienaragiai/reactjs1/src/components/011/lesson/'
  //     )
  //     .then((res) => {
  //       this.setState({
  //         data: res.data,
  //       });
  //     });
  // }

  render() {
    const buttonHandler = () => {
      this.setState({
        button: this.state.button + 1,
      });
      this.setState({
        cats: [
          ...this.state.cats,
          `Murkis ${this.state.button}`,
        ],
      });
    };

    const getKatinukaiHandler = () => {
      axios
        .get(
          'http://localhost/my-vienaragiai/reactjs1/src/components/011/lesson/'
        )
        .then((res) => {
          this.setState({
            data: res.data,
          });
        });
    };

    return (
      <>
        <h1>{this.state.button}</h1>

        {this.state.cats.map(
          (value, i) => (
            <div key={i}>{value}</div>
          )
        )}
        <button onClick={buttonHandler}>
          Click me
        </button>
        <button
          onClick={getKatinukaiHandler}
        >
          Get katinukai
        </button>
        {this.state.data.map(
          (value, i) => (
            <div key={i}>{value}</div>
          )
        )}
      </>
    );
  }
}

export default Katinukai;
