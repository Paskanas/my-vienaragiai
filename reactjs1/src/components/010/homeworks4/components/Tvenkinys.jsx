import Daiktas from './Daiktas';

const Tvenkinys = (props) => {
  const values = props.values;
  return (
    <>
      <Daiktas
        values={values}
        color="red"
        show={2}
      />

      <Daiktas
        values={values}
        color="blue"
        show={1}
      />
    </>
  );
};

export default Tvenkinys;
