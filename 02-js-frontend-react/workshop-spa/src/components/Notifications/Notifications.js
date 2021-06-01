import './Notifications.css';

export default function Notifications() {
    return (
        <div id="notifications">
            <div id="loadingBox" className="notification">
                <span>Loading …</span>
            </div>
            <div id="infoBox" className="notification">
                <span>Info</span>
            </div>
            <div id="errorBox" className="notification">
                <span>Error</span>
            </div>
        </div>
    )
}