import Spalva from './Spalva';
import Tipas from './Tipas';
import Vardas from './Vardas';

const Vandenynas = (props) => {
  return (
    <>
      <Tipas
        values={props.values}
        sort="type"
        color="cyan"
      />
      <Vardas
        values={props.values}
        sort="name"
        color="red"
      />
      <Spalva
        values={props.values}
        sort="color"
        color="green"
      />
    </>
  );
};

export default Vandenynas;
