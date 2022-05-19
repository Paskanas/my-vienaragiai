const Valtis = (props) => {
  const values = props.values;
  return values.map((value, i) => (
    <div
      style={{ color: 'green' }}
      key={i}
    >
      {value.name}
    </div>
  ));
};

export default Valtis;
