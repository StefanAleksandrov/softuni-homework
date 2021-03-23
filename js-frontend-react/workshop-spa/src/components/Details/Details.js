export default function Details() {
    return (
        <>
            <section className="detailsMyPet">
                <h3>Koko</h3>
                <p>Pet counter: <i className="fas fa-heart"></i> 6</p>
                <p className="img"><img
                    src="https://www.freepngimg.com/thumb/parrot/2-parrot-png-images-download-thumb.png" alt="parrot" /></p>
                <form>
                    <textarea type="text" name="description">This is my parrot Koko</textarea>
                    <button className="button"> Save</button>
                </form>
            </section>
            <section className="detailsOtherPet">
                <h3>Spirit</h3>
                <p>Pet counter: 7 <a href="/pet-count"><button className="button"><i className="fas fa-heart"></i>Pet</button></a></p>
                <p className="img"><img src="http://pngimg.com/uploads/horse/horse_PNG321.png" alt="horse" /></p>
                <p className="description">This is my horse Spirit</p>
            </section>
        </>
    )
}