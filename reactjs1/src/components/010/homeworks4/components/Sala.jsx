const Sala = (props) => {
  const values = props.values;
  return values.map((value, i) => (
    <div
      style={{ color: 'red' }}
      key={i}
    >
      {value.name}
    </div>
  ));
};

export default Sala;
