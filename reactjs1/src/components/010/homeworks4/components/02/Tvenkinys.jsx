import Daiktas from './Daiktas';

const Tvenkinys = (props) => {
  const values = props.values;
  return (
    <>
      <Daiktas
        values={values}
        color="cyan"
        show={2}
      />

      <Daiktas
        values={values}
        color="gold"
        show={1}
      />
    </>
  );
};

export default Tvenkinys;
